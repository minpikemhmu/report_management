<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\DivisionState;
use App\Models\Township;
use App\Models\City;
use App\Models\CustomerType;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Services\CustomerService;
use App\Imports\customerImport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{

    public function __construct(private CustomerService $service)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::orderByDesc('updated_at')->get();
        return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer_types= CustomerType::all();
        $divisions = DivisionState::orderby('name')->get();
        $townships = Township::orderby('name')->get();
        $cities = City::orderby('name')->get();
        return view('customer.create',compact('customer_types', 'divisions', 'townships', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $this->service->storeCustomer($request);
        return redirect()->route('customers.index')->with("successMsg",'New Customer is ADDED in your data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customer_types= CustomerType::all();
        $divisions = DivisionState::orderby('name')->get();
        $townships = Township::orderby('name')->get();
        $cities = City::orderby('name')->get();
        return view('customer.edit',compact('customer', 'customer_types', 'divisions', 'townships', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $this->service->update($request, $customer);
        return redirect()->route('customers.index', $customer->id)->with("successMsg",'Existing Customer is UPDATED in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function customerImport(Request $request)
    {
        $import = new customerImport();
        Excel::import($import, request()->file('file'));
        $error = $import->getErrorRows();
        if($import->getSuccess() == false){
            return redirect()->back()->with('failedMsg', "some data of row $error are inavalid!");
        }else{
            return redirect()->back()->with('successMsg', 'Excel file imported successfully.');
        }
    }
}

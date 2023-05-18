<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Merchandiser;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMerchandiserAssignRequest;
use App\Http\Requests\UpdateMerchandiserAssignRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\assignMerchandiserImport;

class MerchandiserAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchandisers = DB::table('customer_merchandiser as cm')
        ->select('cm.id as id','cm.merchandiser_id as merchandiser_id','cm.assign_date as assign_date', 'c.name as customer', 'm.name as merchandiser')
        ->join('customers as c', 'c.id', '=', 'cm.customer_id')
        ->join('merchandisers as m', 'm.id', '=', 'cm.merchandiser_id')
        ->get();
        return view('assignMerchandiser.index',compact('merchandisers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers= Customer::all();
        $merchandisers = Merchandiser::all();
        return view('assignMerchandiser.create',compact('customers', 'merchandisers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchandiserAssignRequest $request)
    {
        $merchandiser = Merchandiser::find($request->merchandiser_id);
        $merchandiser->customers()->attach($request->customer_id, ['assign_date' => $request->assign_date]);
        return redirect()->route('assignMerchandiser.index')->with("successMsg",'Assign Merchandiser successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers= Customer::all();
        $merchandisers = Merchandiser::all();
        $merchandiser = DB::table('customer_merchandiser as cm')
        ->select('cm.id as id','cm.merchandiser_id as merchandiser_id', 'cm.customer_id as customer_id', 'cm.assign_date as assign_date', 'c.name as customer', 'm.name as merchandiser')
        ->join('customers as c', 'c.id', '=', 'cm.customer_id')
        ->join('merchandisers as m', 'm.id', '=', 'cm.merchandiser_id')
        ->where('cm.id',$id)
        ->first();
        return view('assignMerchandiser.edit',compact('customers', 'merchandisers', 'merchandiser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerchandiserAssignRequest $request, $id)
    {
        $merchandiser = Merchandiser::find($id);
        $merchandiser->customers()->wherePivot('assign_date', '=', $request->assign_date)->detach();
        $merchandiser->customers()->attach($request->customer_id, ['assign_date' => $request->assign_date]);
        return redirect()->route('assignMerchandiser.index')->with("successMsg",'Existion Assign update successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assign_client = DB::table('customer_merchandiser')->where('id', $id)->delete();
        return redirect()->back()->with("successMsg",'Existion Assign Delete successfully!!');
    }

    public function assignMerchandiserImport(Request $request)
    {
        $import = new assignMerchandiserImport();
        Excel::import($import, request()->file('file'));
        if($import->getSuccess() == false){
            return redirect()->back()->with('failedMsg', 'Merchandiser and Customer are inavalid!');
        }else{
            return redirect()->back()->with('successMsg', 'Excel file imported successfully.');
        }
    }
}

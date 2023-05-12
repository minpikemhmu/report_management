<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaStaff\StoreBaStaffRequest;
use App\Http\Requests\BaStaff\UpdateBaStaffRequest;
use App\Models\BaStaff;
use App\Models\Channel;
use App\Models\City;
use App\Models\Customer;
use App\Models\Outlet;
use App\Models\SubChannel;
use App\Models\Supervisor;
use App\Services\BaStaffService;
use Illuminate\Http\Request;

class BaStaffController extends Controller
{
    public function __construct(private BaStaffService $baStaffService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baStaffs = BaStaff::orderByDesc('updated_at')->get();
        $supervisor=Supervisor::all();
        $city=City::orderby('name')->get();
        // $outlet=Outlet::all();
        $customers=Customer::all();
        $channel=Channel::all();
        $subchannel=SubChannel::all();
        return view('bastaffs.index', compact('baStaffs', 'supervisor', 'city', 'customers', 'channel', 'subchannel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $baStaffs = BaStaff::all();
        $supervisor=Supervisor::all();
        $city=City::orderby('name')->get();
        // $outlet=Outlet::all();
        $customers=Customer::all();
        $channel=Channel::all();
        $subchannel=SubChannel::all();
        return view('bastaffs.create', compact('baStaffs', 'supervisor', 'city', 'customers', 'channel', 'subchannel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBaStaffRequest $request)
    {
        $this->baStaffService->storeBaStaff($request);
        return redirect()->route('bastaffs.index')->with("successMsg",'New BA Staff is ADDED in your data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaStaff  $baStaff
     * @return \Illuminate\Http\Response
     */
    public function show(BaStaff $baStaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaStaff  $baStaff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baStaff=BaStaff::find($id);
        $supervisor=Supervisor::all();
        $city=City::orderby('name')->get();
        // $outlet=Outlet::all();
        $customers=Customer::all();
        $channel=Channel::all();
        $subchannel=SubChannel::all();
        return view('bastaffs.edit', compact('baStaff', 'supervisor', 'city', 'customers', 'channel', 'subchannel'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaStaff  $baStaff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBaStaffRequest $request, $id )
    {
        $baStaff = BaStaff::find($id);
        $this->baStaffService->update($request, $baStaff);
        return redirect()->route('bastaffs.index')->with("successMsg",'Existing BA Staff is UPDATED in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaStaff  $baStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaStaff $baStaff)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BaStaff;
use App\Models\Channel;
use App\Models\City;
use App\Models\Outlet;
use App\Models\SubChannel;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class BaStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baStaffs = BaStaff::all();
        $supervisor=Supervisor::all();
        $city=City::all();
        $outlet=Outlet::all();
        $channel=Channel::all();
        $subchannel=SubChannel::all();
        return view('bastaffs.index', compact('baStaffs', 'supervisor', 'city', 'outlet', 'channel', 'subchannel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bastaffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input('baName'));
        BaStaff::create([
            'ba_code' => $request->input('baCode'),
            'name' => $request->input('baName'),
            // 'division_state_id' => $request->input('baDivision') ? $request->input('baDivision') : null, 
            // 'supervisor_id' => $request->input('baSupervisor') ? $request->input('baSupervisor') : null,
            // 'city_id' => $request->input('baCity') ? $request->input('baCity') : null,
            // 'outlet_id' => $request->input('baOutlet') ? $request->input('baOutlet') : null,
            // 'channel_id' => $request->input('baChannel') ? $request->input('baChannel') : null,
            // 'subchennel_id' => $request->input('baSubChannel') ? $request->input('baSubChannel') : null,
            'division_state_id' => 1, 
            'supervisor_id' => 1,
            'city_id' => 1,
            'outlet_id' => 1,
            'channel_id' => 1,
            'subchennel_id' => 1,
        ]);

        return redirect()->route('bastaffs.index');
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
        // dd($baStaff->supervisor_id);
        $supervisor=Supervisor::find($baStaff->supervisor_id);
        $city=City::find($baStaff->city_id);
        $outlet=Outlet::find($baStaff->outlet_id);
        $channel=Channel::find($baStaff->channel_id);
        $subchannel=SubChannel::find($baStaff->subchennel_id);
        return view('bastaffs.edit', compact('baStaff', 'supervisor', 'city', 'outlet', 'channel', 'subchannel'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaStaff  $baStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $baStaff = BaStaff::findOrFail($id);
        $baStaff->update([
            'ba_code' => $request->input('baCode'),
            'name' => $request->input('baName'),
            // 'division_state_id' => $request->input('baDivision') ? $request->input('baDivision') : null, 
            // 'supervisor_id' => $request->input('baSupervisor') ? $request->input('baSupervisor') : null,
            // 'city_id' => $request->input('baCity') ? $request->input('baCity') : null,
            // 'outlet_id' => $request->input('baOutlet') ? $request->input('baOutlet') : null,
            // 'channel_id' => $request->input('baChannel') ? $request->input('baChannel') : null,
            // 'subchennel_id' => $request->input('baSubChannel') ? $request->input('baSubChannel') : null,
            'division_state_id' => 1, 
            'supervisor_id' => 1,
            'city_id' => 1,
            'outlet_id' => 1,
            'channel_id' => 1,
            'subchennel_id' => 1,
        ]);
        return redirect()->route('bastaffs.index');
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

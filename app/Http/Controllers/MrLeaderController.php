<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MrSupervisor;
use App\Models\MrLeader;
use App\Http\Requests\StoreMrLeaderRequest;
use App\Http\Requests\UpdateMrLeaderRequest;
use App\Services\MrLeaderService;

class MrLeaderController extends Controller
{

    public function __construct(private MrLeaderService $MrLeaderService)
    {   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mr_leaders = MrLeader::all();
        return view('mr_leaders.index', compact('mr_leaders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supervisors = MrSupervisor::orderby('name')->get();
        return view('mr_leaders.create',compact('supervisors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMrLeaderRequest $request)
    {
        $this->MrLeaderService->storeLeader($request);
        return redirect()->route('mr_leaders.index')->with("successMsg",'New Leader was ADDED in your data');
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
        $supervisors = MrSupervisor::orderby('name')->get();
        $leader = MrLeader::find($id);
        return view('mr_leaders.edit', compact('supervisors', 'leader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMrLeaderRequest $request, $id)
    {
        $leader = MrLeader::find($id);
        $this->MrLeaderService->update($request, $leader);
        return redirect()->route('mr_leaders.index')->with("successMsg",'Existing Leader was UPDATED in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

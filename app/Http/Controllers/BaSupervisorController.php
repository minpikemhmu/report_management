<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supervisor;
use App\Models\BaExecutive;
use App\Http\Requests\StoreBaSupervisorRequest;
use App\Http\Requests\UpdateBaSupervisorRequest;
use App\Models\Region;
use App\Services\BaSupervisorService;

class BaSupervisorController extends Controller
{

    public function __construct(private BaSupervisorService $BaSupervisorService)
    {   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ba_supervisors = Supervisor::all();
        return view('ba_supervisors.index', compact('ba_supervisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $executives = BaExecutive::orderby('name')->get();
        $regions = Region::orderby('name')->get();
        return view('ba_supervisors.create',compact('executives','regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBaSupervisorRequest $request)
    {
        $this->BaSupervisorService->storeSupervisor($request);
        return redirect()->route('ba_supervisors.index')->with("successMsg",'New Supervisor was ADDED in your data');
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
        $executives = BaExecutive::orderby('name')->get();
        $regions = Region::orderby('name')->get();
        $supervisor = Supervisor::find($id);
        return view('ba_supervisors.edit', compact('supervisor', 'executives', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBaSupervisorRequest $request, $id)
    {
        $supervisor = Supervisor::find($id);
        $this->BaSupervisorService->update($request, $supervisor);
        return redirect()->route('ba_supervisors.index')->with("successMsg",'Existing Supervisor was UPDATED in your data');
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

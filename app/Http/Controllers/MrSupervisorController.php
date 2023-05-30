<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MrSupervisor;
use App\Models\MrExecutive;
use App\Http\Requests\StoreMrSupervisorRequest;
use App\Http\Requests\UpdateMrSupervisorRequest;
use App\Services\MrSupervisorService;

class MrSupervisorController extends Controller
{

    public function __construct(private MrSupervisorService $MrSupervisorService)
    {   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mr_supervisors = MrSupervisor::all();
        return view('mr_supervisors.index', compact('mr_supervisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $executives = MrExecutive::orderby('name')->get();
        return view('mr_supervisors.create',compact('executives'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMrSupervisorRequest $request)
    {
        $this->MrSupervisorService->storeSupervisor($request);
        return redirect()->route('mr_supervisors.index')->with("successMsg",'New Supervisor was ADDED in your data');
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
        $executives = MrExecutive::orderby('name')->get();
        $supervisor = MrSupervisor::find($id);
        return view('mr_supervisors.edit', compact('supervisor', 'executives'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMrSupervisorRequest $request, $id)
    {
        $supervisor = MrSupervisor::find($id);
        $this->MrSupervisorService->update($request, $supervisor);
        return redirect()->route('mr_supervisors.index')->with("successMsg",'Existing Supervisor was UPDATED in your data');
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

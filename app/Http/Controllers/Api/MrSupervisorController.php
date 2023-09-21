<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MrSupervisor;
use Illuminate\Http\Request;
use App\Http\Requests\MrSupervisorRequest;
use App\Http\Resources\MrSupervisorResource;
use App\Traits\ResponserTraits;

class MrSupervisorController extends Controller
{
    use ResponserTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MrSupervisorRequest $request)
    {
        $mrSupervisors = MrSupervisor::where('executive_id', $request->executive_id)->get();
        return $this->responseSuccess('Success', MrSupervisorResource::collection($mrSupervisors));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MrSupervisor  $mrSupervisor
     * @return \Illuminate\Http\Response
     */
    public function show(MrSupervisor $mrSupervisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MrSupervisor  $mrSupervisor
     * @return \Illuminate\Http\Response
     */
    public function edit(MrSupervisor $mrSupervisor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MrSupervisor  $mrSupervisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MrSupervisor $mrSupervisor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MrSupervisor  $mrSupervisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(MrSupervisor $mrSupervisor)
    {
        //
    }
}

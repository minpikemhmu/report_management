<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BaStaff;
use Illuminate\Http\Request;
use App\Traits\ResponserTraits;
use App\Http\Requests\BastaffRequest;
use App\Http\Resources\BastaffResource;

class BaStaffController extends Controller
{
    use ResponserTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BastaffRequest $request)
    {
        $baStaffs = BaStaff::where('supervisor_id', $request->supervisor_id)->when(isset($request['name']), function ($q) use ($request) {
            $q->where('name', 'like', "%{$request['name']}%");
        })->paginate(15)->withQueryString();
        return $this->responseSuccess('Success', BastaffResource::collection($baStaffs));
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
    public function edit(BaStaff $baStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaStaff  $baStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaStaff $baStaff)
    {
        //
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

<?php

namespace App\Http\Controllers\Api\BA;

use App\Models\BaDailyReport;
use App\Http\Requests\StoreBaDailyReportRequest;
use App\Http\Requests\UpdateBaDailyReportRequest;
use App\Http\Resources\BaReportTypeResource;
use App\Traits\ResponserTraits;
use App\Http\Controllers\Controller;
use App\Http\Resources\BaDailyReportResource;
use App\Services\BaDailyReportService;


class BaDailyReportController extends Controller
{
    use ResponserTraits;
    public function __construct(private BaDailyReportService $service)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreBaDailyReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBaDailyReportRequest $request)
    {
        // Store the daily report
        $baDailyReport = $this->service->store($request);
        $getResponseBaDailyReport = BaDailyReport::find($baDailyReport->id);
        
        return $this->responseCreated("Successfully created a BA Daily Report", new BaDailyReportResource($getResponseBaDailyReport));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaDailyReport  $baDailyReport
     * @return \Illuminate\Http\Response
     */
    public function show(BaDailyReport $baDailyReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaDailyReport  $baDailyReport
     * @return \Illuminate\Http\Response
     */
    public function edit(BaDailyReport $baDailyReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBaDailyReportRequest  $request
     * @param  \App\Models\BaDailyReport  $baDailyReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBaDailyReportRequest $request, BaDailyReport $baDailyReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaDailyReport  $baDailyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaDailyReport $baDailyReport)
    {
        //
    }
}

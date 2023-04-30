<?php

namespace App\Http\Controllers;

use App\Models\BaDailyReport;
use Illuminate\Http\Request;
use App\http\Resources\BaDailyReportCollection;

class BaDailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all BA Daily Report to show in Admin Portal
        // $getAllBaDailyReports = BaDailyReport::with('products')->get();
        $getAllBaDailyReports = BaDailyReport::with('products')->get();
        return view('Reports.ba_reports.ba_daily_reports.index', ['baDailyReports' => $getAllBaDailyReports]);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaDailyReport  $baDailyReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaDailyReport $baDailyReport)
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

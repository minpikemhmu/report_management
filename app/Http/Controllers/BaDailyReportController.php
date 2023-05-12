<?php

namespace App\Http\Controllers;

use App\Exports\BaDailyReportExport;
use App\Models\BaDailyReport;
use Illuminate\Http\Request;
use App\http\Resources\BaDailyReportCollection;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

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

        $timePeriod = 'last_week';
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        $baDailyReports = BaDailyReport::whereBetween('ba_report_date', [$startDate, $endDate])->with('products')->orderByDesc('created_at')->get();
        return view('Reports.ba_reports.ba_daily_reports.index', compact('baDailyReports', 'timePeriod'));

        // $getAllBaDailyReports = BaDailyReport::with('products')->get();
        // return view('Reports.ba_reports.ba_daily_reports.index', ['baDailyReports' => $getAllBaDailyReports]);
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

    // public function baDailyReportExport(Request $request)
    // {
    //     $reports = json_decode($request->dataArray);
    //     if (sizeof($reports) == 0) {
    //         return response()->json([
    //             'message' => 'There is no data'
    //         ]);
    //     } else {
    //         $success_export = new BaDailyReportExport(collect($reports));
    //         return Excel::download($success_export, 'ba_daily_report.csv');
    //     }
    // }

    public function showFilterBaDailyReports(Request $request)
    {
        // dd($request->input('time_period'));
        $timePeriod = $request->input('time_period') ?? 'last_week';
        $startDate = null;
        $endDate = Carbon::now();
        
        switch ($timePeriod) {
            case 'last_week':
                $startDate = Carbon::now()->subWeek();
                break;
            case 'last_month':
                $startDate = Carbon::now()->subMonth();
                break;
            case 'last_six_months':
                $startDate = Carbon::now()->subMonths(6);
                break;
            case 'last_year':
                $startDate = Carbon::now()->subYear();
                break;
        }

        $baDailyReports = BaDailyReport::whereBetween('ba_report_date', [$startDate, $endDate])->with('products')->orderByDesc('created_at')->get();
        return view('Reports.ba_reports.ba_daily_reports.index', compact('baDailyReports', 'timePeriod'));
    }
}

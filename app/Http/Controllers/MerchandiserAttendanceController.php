<?php

namespace App\Http\Controllers;

use App\Models\MerchandiserAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MerchandiserAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timePeriod = 'last_week';
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        $getAllMerchandiserAttendances = MerchandiserAttendance::with('staff')->whereBetween('check_in_time', [$startDate, $endDate])->orderByDesc('check_out_time')->get();
        return view('Reports.attandance.merchandiser_attendance_report.index', compact('getAllMerchandiserAttendances', 'timePeriod'));
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
     * @param  \App\Models\MerchandiserAttendance  $merchandiserAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(MerchandiserAttendance $merchandiserAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MerchandiserAttendance  $merchandiserAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(MerchandiserAttendance $merchandiserAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MerchandiserAttendance  $merchandiserAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MerchandiserAttendance $merchandiserAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MerchandiserAttendance  $merchandiserAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(MerchandiserAttendance $merchandiserAttendance)
    {
        //
    }

    public function showFilterMerchandiserAttendance(Request $request)
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

        $getAllMerchandiserAttendances = MerchandiserAttendance::with('staff')->whereBetween('check_in_time', [$startDate, $endDate])->orderByDesc('check_out_time')->get();

        return view('Reports.attandance.merchandiser_attendance_report.index', compact('getAllMerchandiserAttendances', 'timePeriod'));
    }
}

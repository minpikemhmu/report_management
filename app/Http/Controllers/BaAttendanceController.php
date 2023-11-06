<?php

namespace App\Http\Controllers;

use App\Models\BaAttendance;
use App\Http\Requests\StoreBaAttendanceRequest;
use App\Http\Requests\UpdateBaAttendanceRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BaAttendanceController extends Controller
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

        $getAllBaAttendances = BaAttendance::with('staff')
            ->whereBetween('check_in_time', [$startDate, $endDate])
            ->orderByDesc('check_out_time')
            ->get();
            
        return view('Reports.attandance.ba_attendance_report.index', compact('getAllBaAttendances', 'timePeriod'));
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
     * @param  \App\Http\Requests\StoreBaAttendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBaAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaAttendance  $baAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaAttendance  $baAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(BaAttendance $baAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBaAttendanceRequest  $request
     * @param  \App\Models\BaAttendance  $baAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBaAttendanceRequest $request, BaAttendance $baAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaAttendance  $baAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaAttendance $baAttendance)
    {
        //
    }

    public function showFilterAttendance(Request $request)
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

        $getAllBaAttendances = BaAttendance::with('staff')
            ->whereBetween('check_in_time', [$startDate, $endDate])
            ->orderByDesc('check_out_time')
            ->get();

        return view('Reports.attandance.ba_attendance_report.index', compact('getAllBaAttendances', 'timePeriod'));
    }

    public function unblockBaAttandence(Request $request){
        $attendance_id = $request->id;
        $attendance = BaAttendance::find($attendance_id);
        $attendance->update([
            'is_check_out'       => 1,
            'is_attendance' => 1,
        ]);

        // Redirect or return a response, e.g., to a success page
        return redirect()->route('ba_attandence.index')->with("successMsg",'Unblock Successfully');
    }
}

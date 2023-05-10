<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MerchandiserAttendanceRequest;
use App\Http\Resources\MerchandiserAttendanceResource;
use App\Models\MerchandiserAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ResponserTraits;

class MerchandiserAttendanceController extends Controller
{
    use ResponserTraits;
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

    // Store or Upate the Merchandiser Attendance
    public function storeOrUpdateMerchandiserAttendance(MerchandiserAttendanceRequest $request)
    {
        $staffId = Auth::user()->id;
        $now = Carbon::now('Asia/Yangon'); // store in MMT

        $attendance = MerchandiserAttendance::where('staff_id', $staffId)
            ->whereDate('check_in_time', $now->format('Y-m-d'))
            ->first();

        if (!$attendance) {
            if ($request->is_check_in) {
                $attendance = MerchandiserAttendance::create([
                    'staff_id' => $staffId,
                    'is_check_in' => true,
                    'check_in_time' => $now,
                ]);
                // return response()->json(['message' => $now->format('Y-m-d') . ' Check-in recorded successfully.']);
                return $this->responseSuccess($now->format('Y-m-d') . ' Check-in recorded successfully.', new MerchandiserAttendanceResource(MerchandiserAttendance::findOrFail($attendance->id)));
            } else {
                // return response()->json(['error' => 'No check-in recorded for this date.'], 422);
                return $this->responseError('No check-in recorded for this date.', 422);
            }
        }

        if ($request->is_check_in) {
            // return response()->json(['error' => 'Check-in already recorded for this date.'], 422);
            return $this->responseError('No check-in recorded for this date.', 422);
        }

        if ($attendance->is_check_out) {
            // return response()->json(['error' => 'Check-out already recorded for this date.'], 422);
            return $this->responseError('No check-in recorded for this date.', 422);
        }

        $attendance->update([
            'is_check_out' => true,
            'check_out_time' => $now,
        ]);

        // return response()->json(['message' => 'Check-out recorded successfully.']);
        return $this->responseSuccess($now->format('Y-m-d') . ' Check-out recorded successfully.', new MerchandiserAttendanceResource(MerchandiserAttendance::findOrFail($attendance->id)));
    }
}

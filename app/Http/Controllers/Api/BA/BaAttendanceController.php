<?php

namespace App\Http\Controllers\Api\BA;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaAttendanceRequest;
use App\Http\Resources\BaAttendanceResource;
use App\Models\Attendance;
use App\Models\BaAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ResponserTraits;

class BaAttendanceController extends Controller
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
     * @param  \App\Models\BaAttendance  $baAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(BaAttendance $baAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaAttendance  $baAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaAttendance $baAttendance)
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

    // Store or Upate the BA Attendance
    public function storeOrUpdateBaAttendance(BaAttendanceRequest $request)
    {
        $staffId = Auth::user()->id;
        $now = Carbon::now('Asia/Yangon'); // store in MMT

        $attendance = BaAttendance::where('staff_id', $staffId)
            ->whereDate('check_in_time', $now->format('Y-m-d'))
            ->first();

        if (!$attendance) {
            if ($request->is_check_in) {
                $attendance = BaAttendance::create([
                    'staff_id' => $staffId,
                    'is_check_in' => true,
                    'check_in_time' => $now,
                ]);
                // return response()->json(['message' => $now->format('Y-m-d') . ' Check-in recorded successfully.']);
                return $this->responseSuccess($now->format('Y-m-d') . ' Check-in recorded successfully.', new BaAttendanceResource(BaAttendance::findOrFail($attendance->id)));
            } else {
                // return response()->json(['error' => 'No check-in recorded for this date.'], 422);
                return $this->responseError('No check-in recorded for this date.', 422);
            }
        }

        if ($request->is_check_in) {
            // return response()->json(['error' => 'Check-in already recorded for this date.'], 422);
            return $this->responseError('Check-in already recorded for this date.', 422);
        }

        if ($attendance->is_check_out) {
            // return response()->json(['error' => 'Check-out already recorded for this date.'], 422);
            return $this->responseError('Check-out already recorded for this date.', 422);

        }

        $attendance->update([
            'is_check_out' => true,
            'is_attendance' => true,
            'check_out_time' => $now,
        ]);

        // return response()->json(['message' => 'Check-out recorded successfully.']);
        return $this->responseSuccess($now->format('Y-m-d') . ' Check-out recorded successfully.', new BaAttendanceResource(BaAttendance::findOrFail($attendance->id)));
    }

    public function checkAttendance(Request $request){
        $ba_staff = auth()->user();
        $getAllBaAttendance = $ba_staff->attendances()->today()->get();
        $customData = [
            'staff_id' => auth()->user()->id,
            'is_check_in' => 0,
            'is_check_out' => 0,
            'is_attendance' => 0,
        ];
        if($getAllBaAttendance->isEmpty()){
            return response(["code"    => 200,
            "message"           => "SUCCESS", 
            "data"             => [$customData],
            ]); 
        }
        return $this->responseSuccess('Success',BaAttendanceResource::collection($getAllBaAttendance));
    }
}

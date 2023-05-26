<?php

namespace App\Http\Controllers\Api\BA;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaAssignResource;
use App\Models\BaAssign;
use Illuminate\Http\Request;
use App\Traits\ResponserTraits;

class AssignBaController extends Controller
{
    use ResponserTraits;

    public function getAssignmentsByBA(Request $request)
    {
        $ba_staff_id = auth()->user()->id;

        // Retrieve assignments by BA staff ID
        $month = $request->input('month') ?? date('n');
        $year = $request->input('year') ?? date('Y');

        $assignments = BaAssign::where('ba_staff_id', $ba_staff_id)
            ->where('month', $month)
            ->where('year', $year)
            ->get();

        return $this->responseSuccess('Success', BaAssignResource::collection($assignments));
    }
}

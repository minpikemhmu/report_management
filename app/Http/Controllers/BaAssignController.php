<?php

namespace App\Http\Controllers;

use App\Models\BaAssign;
use App\Http\Requests\StoreBaAssignRequest;
use App\Http\Requests\UpdateBaAssignRequest;
use App\Models\BaStaff;
use App\Models\ProductKeyCategory;
use App\Services\BaAssignService;
use Carbon\Carbon;

class BaAssignController extends Controller
{
    public function __construct(private BaAssignService $service)
    {
    }
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

        // $getAllBaAttendances = BaAttendance::orderByDesc('updated_at')->get();
        $getAllBaAassigns = BaAssign::whereBetween('updated_at', [$startDate, $endDate])->orderByDesc('updated_at')->get();
        return view("Assign.ba_assign.index", compact('getAllBaAassigns', 'timePeriod'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $baStaffs = BaStaff::all();
        $productKeyCategories = ProductKeyCategory::all();
        return view('Assign.ba_assign.create', compact('baStaffs', 'productKeyCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBaAssignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBaAssignRequest $request)
    {
        $baAssign = $this->service->storeBaAssign($request);
        return redirect()->route('assignBa.index')->with("successMsg",'New BA Assign was ADDED in your data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaAssign  $baAssign
     * @return \Illuminate\Http\Response
     */
    public function show(BaAssign $baAssign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaAssign  $baAssign
     * @return \Illuminate\Http\Response
     */
    public function edit(BaAssign $baAssign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBaAssignRequest  $request
     * @param  \App\Models\BaAssign  $baAssign
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBaAssignRequest $request, BaAssign $baAssign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaAssign  $baAssign
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaAssign $baAssign)
    {
        //
    }
}

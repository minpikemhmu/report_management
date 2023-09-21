<?php

namespace App\Http\Controllers\Api\BA;

use App\Models\BaDailyReport;
use App\Http\Requests\StoreBaDailyReportRequest;
use App\Http\Requests\UpdateBaDailyReportRequest;
use App\Http\Resources\BaReportTypeResource;
use App\Traits\ResponserTraits;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use App\Http\Resources\BaDailyReportResource;
use App\Services\BaDailyReportService;
use Illuminate\Http\Request;
use App\Http\Requests\BaReportHistoryRequest;

class BaDailyReportController extends Controller
{
    use ResponserTraits;

    public function __construct(private BaDailyReportService $service)
    {
    }

    public function paginate(?int $perPage = 15): LengthAwarePaginator
    {
        dd(request('product_name'));
        return  $this->model()
            ->latest()
            ->paginate($perPage)
            ->withQueryString();
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

    public function getAllBaDailyReportByFilters(BaReportHistoryRequest $request)
    {
        $limit = isset($request['limit']) ? $request['limit'] : '15';
        // default start date = with client needs & end date = today
        $defaultStartDateString = '2020-01-01';
        $defaultStartDateBeforeFormat = strtotime($defaultStartDateString);
        $defaultStartDate = date('Y-m-d', $defaultStartDateBeforeFormat);
        $defaultEndDate = date('Y-m-d');

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if (!isset($startDate) && !isset($endDate)) {
            $reports = BaDailyReport::where('bastaff_id',$request->bastaff_id)->orderBy('created_at', 'desc')->paginate($limit)->withQueryString();
            return  $this->responseSuccessWithPaginate('success', BaDailyReportResource::collection($reports));
        } elseif (!isset($startDate) && isset($endDate)) {

            $startDate = $defaultStartDate;
        } elseif (isset($startDate) && !isset($endDate)) {

            $endDate = $defaultEndDate;
        }
        
        $reports = BaDailyReport::where('bastaff_id',$request->bastaff_id)->orderBy('created_at', 'desc')->whereBetween('ba_report_date', [$startDate, $endDate])->paginate($limit)->withQueryString();
        return  $this->responseSuccessWithPaginate('success', BaDailyReportResource::collection($reports));
    }
}

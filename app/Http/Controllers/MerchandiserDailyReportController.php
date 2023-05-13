<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MerchandiseReport;
use App\Exports\MerchandiserReportExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BaStaffImport;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class MerchandiserDailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(6); 
        $getAllDailyReports = MerchandiseReport::whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate)->orderBy('merchandise_reports.created_at', 'DESC')->get();
        return view('Reports.ba_reports.merchandise_report.index', ['merchandiserReports' => $getAllDailyReports]);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getDailyReport = MerchandiseReport::find($id);
        return view('Reports.ba_reports.merchandise_report.show', ['merchandiserReport' => $getDailyReport]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function merchandiserReportExport(Request $request)
    {
        $reports = json_decode($request->dataArray);
        if (sizeof($reports) == 0) {
            return response()->json([
                'message' => 'There is no data'
            ]);
        } else {
            $success_export = new MerchandiserReportExport(collect($reports));
            return Excel::download($success_export, 'merchandiser_report.csv');
        }
    }

    public function baStaffImport(Request $request)
    {
        Excel::import(new BaStaffImport, request()->file('file'));

        return redirect()->back()->with('successMsg', 'Excel file imported successfully.');
    }

    public function getMerchandiserReport(Request $request){
        $date  = strtotime($request->startDate);
        $startDate  = date('Y-m-d', $date);
        $date1  = strtotime($request->endDate);
        $endDate  = date('Y-m-d', $date1);
        $lastSevenDay = Carbon::now()->subDays(6);
        if ($request->startDate == null && $request->endDate == null) {
            $getAllDailyReports = DB::table('merchandise_reports')
                ->select('merchandise_reports.*','merchandisers.name as merchandiser_name', 'customers.name as customer_name','gondolar_types.name as gondolar_type_name', 'trip_types.name as trip_type_name', 'outskirt_types.name as outskirt_type_name','merchandiser_report_types.name as report_type')
                ->leftjoin('merchandisers', 'merchandise_reports.merchandiser_id', '=', 'merchandisers.id')
                ->leftjoin('customers', 'merchandise_reports.customer_id', '=', 'customers.id')
                ->leftjoin('gondolar_types', 'merchandise_reports.gondolar_type_id', '=', 'gondolar_types.id')
                ->leftjoin('trip_types', 'merchandise_reports.trip_type_id', '=', 'trip_types.id')
                ->leftjoin('outskirt_types', 'merchandise_reports.outskirt_type_id', '=', 'outskirt_types.id')
                ->leftjoin('merchandiser_report_types', 'merchandise_reports.merchandiser_report_type_id', '=', 'merchandiser_report_types.id')
                ->where('merchandise_reports.created_at', '>=', $lastSevenDay)
                ->orderBy('merchandise_reports.created_at', 'DESC')
                ->get();
        } elseif ($request->startDate != null && $request->endDate != null) {
            $getAllDailyReports = DB::table('merchandise_reports')
                ->select('merchandise_reports.*','merchandisers.name as merchandiser_name', 'customers.name as customer_name','gondolar_types.name as gondolar_type_name', 'trip_types.name as trip_type_name', 'outskirt_types.name as outskirt_type_name','merchandiser_report_types.name as report_type')
                ->leftjoin('merchandisers', 'merchandise_reports.merchandiser_id', '=', 'merchandisers.id')
                ->leftjoin('customers', 'merchandise_reports.customer_id', '=', 'customers.id')
                ->leftjoin('gondolar_types', 'merchandise_reports.gondolar_type_id', '=', 'gondolar_types.id')
                ->leftjoin('trip_types', 'merchandise_reports.trip_type_id', '=', 'trip_types.id')
                ->leftjoin('outskirt_types', 'merchandise_reports.outskirt_type_id', '=', 'outskirt_types.id')
                ->leftjoin('merchandiser_report_types', 'merchandise_reports.merchandiser_report_type_id', '=', 'merchandiser_report_types.id')
                ->whereDate('merchandise_reports.created_at', '>=', $startDate)
                ->whereDate('merchandise_reports.created_at', '<=', $endDate)
                ->orderBy('merchandise_reports.created_at', 'DESC')
                ->get();
        } else {
            $getAllDailyReports = [];
        }
        return Datatables::of($getAllDailyReports)->addIndexColumn()->toJson();
    }
}

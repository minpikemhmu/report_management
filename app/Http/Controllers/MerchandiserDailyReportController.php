<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MerchandiseReport;
use App\Models\MerchandiserReportType;
use App\Exports\MerchandiserReportExport;
use App\Models\MrInputField;
use Maatwebsite\Excel\Facades\Excel;
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
        $profile_active_inputFields_identifier_displayName = MrInputField::select('merchandiser_report_type_id', 'identifier', 'display_name', 'field_type', 'list_data', 'active_status')
                                                            ->where('merchandiser_report_type_id', 1)
                                                            ->where('active_status', 1)
                                                            ->orderBy('display_order')
                                                            ->get();
        $db_name = "merchandise_reports.";
        $merchandiserReports = "";
        $querySubString = "";
        $query = DB::table('merchandise_reports')->select('merchandise_reports.id','merchandise_reports.created_at','latitude AS latitude', 'longitude AS longitude', 
        'actual_latitude as actual_latitude',
        'actual_longitude As actual_longitude',
        'customers.name as customer', 'merchandisers.name As merchandiser', 
        'merchandiser_report_types.name as report_type')
            ->leftjoin('merchandiser_report_types', 'merchandise_reports.merchandiser_report_type_id', '=', 'merchandiser_report_types.id')
            ->leftjoin('merchandisers', 'merchandise_reports.merchandiser_id', '=', 'merchandisers.id')
            ->leftjoin('customers', 'merchandise_reports.customer_id', '=', 'customers.id')
            // ->where('merchandise_reports.merchandiser_report_type_id', '=', 2)
            ->orderBy('merchandise_reports.created_at', 'DESC');
            foreach ($profile_active_inputFields_identifier_displayName as $key => $value) {
                if ($value->active_status) {
                    $querySubString = '';
            
                    if ($value->field_type === "list_input") {
                        $query->leftJoin($value->list_data, "merchandise_reports.{$value->identifier}", '=', "{$value->list_data}.id");
                        $querySubString = "{$value->list_data}.name AS {$value->display_name}";
                    } elseif ($value->field_type == "radio_input") {
                        $query->selectRaw("CASE WHEN {$value->active_status} = 1 THEN 'yes' ELSE 'no' END AS {$value->display_name}");
                    } else {
                        $querySubString = "{$db_name}{$value->identifier} AS {$value->display_name}";
                    }
            
                    if (!empty($querySubString)) {
                        $query->addSelect($querySubString);
                    }
                }
            }
            
       $merchandiserReports = $query->paginate(10);
       $report_types = MerchandiserReportType::all();
       return view('Reports.ba_reports.merchandise_report.index', compact('merchandiserReports', 'report_types'));
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
        $merchandiser_report_type_id = MerchandiseReport::where('id', $id)->value('merchandiser_report_type_id');
        $profile_active_inputFields_identifier_displayName = MrInputField::select('merchandiser_report_type_id', 'identifier', 'display_name', 'field_type', 'list_data', 'active_status')
                                                            ->where('merchandiser_report_type_id', $merchandiser_report_type_id)
                                                            ->where('active_status', 1)
                                                            ->orderBy('display_order')
                                                            ->get();
        $db_name = "merchandise_reports.";
        $gedetailtDailyReport = "";
        $querySubString = "";
        $query = DB::table('merchandise_reports')->select('merchandise_reports.id','merchandise_reports.created_at','latitude AS latitude', 'longitude AS longitude', 
        'actual_latitude as actual_latitude',
        'actual_longitude As actual_longitude',
        'customers.name as customer', 'merchandisers.name As merchandiser', 
        'merchandiser_report_types.name as report_type')
            ->leftjoin('merchandiser_report_types', 'merchandise_reports.merchandiser_report_type_id', '=', 'merchandiser_report_types.id')
            ->leftjoin('merchandisers', 'merchandise_reports.merchandiser_id', '=', 'merchandisers.id')
            ->leftjoin('customers', 'merchandise_reports.customer_id', '=', 'customers.id')
            ->where('merchandise_reports.id', '=', $id)
            ->orderBy('merchandise_reports.created_at', 'DESC');
            foreach ($profile_active_inputFields_identifier_displayName as $key => $value) {
                if ($value->active_status) {
                    $querySubString = '';
            
                    if ($value->field_type === "list_input") {
                        $query->leftJoin($value->list_data, "merchandise_reports.{$value->identifier}", '=', "{$value->list_data}.id");
                        $querySubString = "{$value->list_data}.name AS {$value->display_name}";
                    } elseif ($value->field_type == "radio_input") {
                        $query->selectRaw("CASE WHEN {$value->active_status} = 1 THEN 'yes' ELSE 'no' END AS {$value->display_name}");
                    } else {
                        $querySubString = "{$db_name}{$value->identifier} AS {$value->display_name}";
                    }
            
                    if (!empty($querySubString)) {
                        $query->addSelect($querySubString);
                    }
                }
            }
            
        $gedetailtDailyReport = $query->first();
        return view('Reports.ba_reports.merchandise_report.show', ['merchandiserReport' => $gedetailtDailyReport]);
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

    public function getMerchandiserReport(Request $request)
    {
        $date  = strtotime($request->startDate);
        $startDate  = date('Y-m-d', $date);
        $date1  = strtotime($request->endDate);
        $endDate  = date('Y-m-d', $date1);
        $lastSevenDay = Carbon::now()->subDays(6);
        if ($request->startDate == null && $request->endDate == null) {
            $getAllDailyReports = DB::table('merchandise_reports')
                ->select(
                    'merchandise_reports.*',
                    'merchandisers.name as merchandiser_name',
                    'customers.name as customer_name',
                    'gondolar_types.name as gondolar_type_name',
                    'trip_types.name as trip_type_name',
                    'outskirt_types.name as outskirt_type_name',
                    'merchandiser_report_types.name as report_type',
                    DB::raw("CASE 
                        WHEN merchandise_reports.planogram = 1 THEN 'Yes' 
                        WHEN merchandise_reports.planogram = 0 THEN 'No' 
                        ELSE NULL 
                        END AS my_planogram"),
                    DB::raw("CASE 
                        WHEN merchandise_reports.hygiene = 1 THEN 'Yes' 
                        WHEN merchandise_reports.hygiene = 0 THEN 'No' 
                        ELSE NULL 
                        END AS my_hygiene"),
                    DB::raw("CASE 
                        WHEN merchandise_reports.sale_team_visit = 1 THEN 'Yes' 
                        WHEN merchandise_reports.sale_team_visit = 0 THEN 'No' 
                        ELSE NULL 
                        END AS my_sale_team_visit"),
                )
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
                ->select(
                    'merchandise_reports.*',
                    'merchandisers.name as merchandiser_name',
                    'customers.name as customer_name',
                    'gondolar_types.name as gondolar_type_name',
                    'trip_types.name as trip_type_name',
                    'outskirt_types.name as outskirt_type_name',
                    'merchandiser_report_types.name as report_type',
                    DB::raw("CASE 
                        WHEN merchandise_reports.planogram = 1 THEN 'Yes' 
                        WHEN merchandise_reports.planogram = 0 THEN 'No' 
                        ELSE NULL 
                        END AS my_planogram"),
                    DB::raw("CASE 
                        WHEN merchandise_reports.hygiene = 1 THEN 'Yes' 
                        WHEN merchandise_reports.hygiene = 0 THEN 'No' 
                        ELSE NULL 
                        END AS my_hygiene"),
                    DB::raw("CASE 
                        WHEN merchandise_reports.sale_team_visit = 1 THEN 'Yes' 
                        WHEN merchandise_reports.sale_team_visit = 0 THEN 'No' 
                        ELSE NULL 
                        END AS my_sale_team_visit"),
                )
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

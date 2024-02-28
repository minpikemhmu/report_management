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
        $date1 = strtotime($endDate);
        $eDate = date('m/d/Y', $date1);
        $startDate = Carbon::today()->subDays(6);
        $date2 = strtotime($startDate);
        $sDate = date('m/d/Y', $date2);
        $merchandiser_report_type_id = 100;
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
            ->whereDate('merchandise_reports.created_at', '>=', $startDate)
            ->whereDate('merchandise_reports.created_at', '<=', $endDate)
            ->orderBy('merchandise_reports.created_at', 'DESC');
            
       $merchandiserReports = $query->paginate(10);
       $report_types = MerchandiserReportType::all();
       return view('Reports.ba_reports.merchandise_report.index', compact('merchandiserReports', 'report_types', 'sDate', 'eDate', 'merchandiser_report_type_id'));
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
                        $alias = str_replace(' ', '_', $value->display_name); // Replace spaces with underscores
                        $escapedAlias = "`$alias`";
                        $query->selectRaw("CASE WHEN {$value->identifier} = 1 THEN 'yes' ELSE 'no' END AS {$escapedAlias}");
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
        $sDateFormatted = str_replace('-', '/', $request->startDate);
        $eDateFormatted = str_replace('-', '/', $request->endDate);
        $date  = strtotime($sDateFormatted);
        $startDate  = date('Y-m-d', $date);
        $date1  = strtotime($eDateFormatted);
        $endDate  = date('Y-m-d', $date1);
        $report_type  = $request->report_type;
        $profile_active_inputFields_identifier_displayName = MrInputField::select('merchandiser_report_type_id', 'identifier', 'display_name', 'field_type', 'list_data', 'active_status')
                                                            ->where('merchandiser_report_type_id', $report_type)
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
            ->whereDate('merchandise_reports.created_at', '>=', $startDate)
            ->whereDate('merchandise_reports.created_at', '<=', $endDate)
            ->where('merchandise_reports.merchandiser_report_type_id', '=', $report_type)
            ->orderBy('merchandise_reports.created_at', 'DESC');
            foreach ($profile_active_inputFields_identifier_displayName as $key => $value) {
                if ($value->active_status) {
                    $querySubString = '';
            
                    if ($value->field_type === "list_input") {
                        $query->leftJoin($value->list_data, "merchandise_reports.{$value->identifier}", '=', "{$value->list_data}.id");
                        $querySubString = "{$value->list_data}.name AS {$value->display_name}";
                    } elseif ($value->field_type == "radio_input") {
                        $alias = str_replace(' ', '_', $value->display_name); // Replace spaces with underscores
                        $query->selectRaw("CASE WHEN {$value->identifier} = 1 THEN 'yes' ELSE 'no' END AS {$alias}");
                    } else {
                        $querySubString = "{$db_name}{$value->identifier} AS {$value->display_name}";
                    }
            
                    if (!empty($querySubString)) {
                        $query->addSelect($querySubString);
                    }
                }
            }
            
        $merchandiserReports = $query->get();
        if ($merchandiserReports->count() > 0) {
            $item = $merchandiserReports->first(); // Get the first item in the collection
            $item_array = (array)$item;
            $report_columns = array_keys($item_array);
        }
        $success_export = new MerchandiserReportExport(collect($merchandiserReports), $report_columns);
        return Excel::download($success_export, 'merchandiser_report.csv');
    }

    public function getMerchandiserReport(Request $request)
    {
        $sDate = $request->startDate;
        $date  = strtotime($request->startDate);
        $startDate  = date('Y-m-d', $date);
        $eDate = $request->endDate;
        $date1  = strtotime($request->endDate);
        $endDate  = date('Y-m-d', $date1);
        $merchandiser_report_type_id = $request->merchandiser_report_type_id;
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
            ->whereDate('merchandise_reports.created_at', '>=', $startDate)
            ->whereDate('merchandise_reports.created_at', '<=', $endDate)
            ->when(isset($request->merchandiser_report_type_id), function ($q) use ($request) {
                $q->where('merchandiser_report_type_id', $request->merchandiser_report_type_id);
            })
            ->orderBy('merchandise_reports.created_at', 'DESC');
       $merchandiserReports = $query->paginate(10);
       $report_types = MerchandiserReportType::all();
       if($merchandiser_report_type_id == null){
        $merchandiser_report_type_id =100;
       }
       return view('Reports.ba_reports.merchandise_report.index', compact('merchandiserReports', 'report_types', 'sDate', 'eDate', 'merchandiser_report_type_id'));
    }
}

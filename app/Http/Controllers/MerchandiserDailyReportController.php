<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MerchandiseReport;
use App\Exports\MerchandiserReportExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BaStaffImport;

class MerchandiserDailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAllDailyReports = MerchandiseReport::all();
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
}

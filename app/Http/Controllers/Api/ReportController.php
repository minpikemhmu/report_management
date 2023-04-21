<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MerchandiseReport;
use Carbon\Carbon;
use App\Http\Requests\MerchandiserReportRequest;

class ReportController extends Controller
{
    public function storeMerchandiseReport(MerchandiserReportRequest $request){
        $report                    = new MerchandiseReport;
        $report->merchandiser_id   = $request->merchandiser_id;
        $report->customer_id       = $request->customer_id;
        $report->gondolar_type_id  = $request->gondolar_type_id;
        $report->trip_type_id      = $request->trip_type_id;
        $report->outskirt_type_id  = $request->outskirt_type_id;

        if(isset($request->qty)){
            $report->qty  = $request->qty;
        }
        if(isset($request->gondolar_size_inches_length)){
            $report->gondolar_size_inches_length  = $request->gondolar_size_inches_length;
        }
        if(isset($request->gondolar_size_inches_weight)){
            $report->gondolar_size_inches_weight  = $request->gondolar_size_inches_weight;
        }
        if(isset($request->gondolar_size_centimeters_length)){
            $report->gondolar_size_centimeters_length  = $request->gondolar_size_centimeters_length;
        }
        if(isset($request->gondolar_size_centimeters_weight)){
            $report->gondolar_size_centimeters_weight  = $request->gondolar_size_centimeters_weight;
        }
        if(isset($request->backlit_size_inches_length)){
            $report->backlit_size_inches_length  = $request->backlit_size_inches_length;
        }
        if(isset($request->backlit_size_inches_weight)){
            $report->backlit_size_inches_weight  = $request->backlit_size_inches_weight;
        }
        if(isset($request->backlit_size_centimeters_length)){
            $report->backlit_size_centimeters_length  = $request->backlit_size_centimeters_length;
        }
        if(isset($request->backlit_size_centimeters_weight)){
            $report->backlit_size_centimeters_weight  = $request->backlit_size_centimeters_weight;
        }
        if(isset($request->outlet_photo_before)){
            $report->outlet_photo_before  = $request->outlet_photo_before;
        }
        if(isset($request->outlet_photo_after)){
            $report->outlet_photo_after  = $request->outlet_photo_after;
        }
        if(isset($request->remark)){
            $report->remark  = $request->remark;
        }
        if(isset($request->latitude)){
            $report->latitude  = $request->latitude;
        }
        if(isset($request->longitude)){
            $report->longitude  = $request->longitude;
        }
        $report->save();
        return response(["code"    => "200",
        "status"           => "SUCCESS", 
        "message"          => "Store SuccessFul",
        "data"             => $report,
]); 
    }
}

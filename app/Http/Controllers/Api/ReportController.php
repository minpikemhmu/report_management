<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MerchandiseReport;
use Carbon\Carbon;
use App\Http\Requests\MerchandiserReportRequest;
use App\Http\Requests\ImageDeleteRequest;
use App\Http\Requests\ImageUploadRequest;
use App\Models\Image;
use App\Services\ImageUploadService;
use App\Traits\ResponserTraits;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\MerchandiserReportResource;

class ReportController extends Controller
{
    use ResponserTraits;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }
    public function storeMerchandiseReport(MerchandiserReportRequest $request){
        Log::info($request->all());
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
            $upload_image = $this->imageUploadService->uploadBase64($request->outlet_photo_before, new Image());

            $to_image = $request->toImage($upload_image);

            $to_image->save();

            $report->outlet_photo_before  = $upload_image;
        }
        if(isset($request->outlet_photo_after)){
            $upload_image = $this->imageUploadService->uploadBase64($request->outlet_photo_after, new Image());

            $to_image = $request->toImage($upload_image);

            $to_image->save();

            $report->outlet_photo_after  = $upload_image;
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
        return response(["code"    => 200,
        "status"           => "SUCCESS", 
        "message"          => "Store SuccessFul",
        "data"             => $report,
        ]); 
    }

    public function reportHistory(Request $request)
    {
        $limit = isset($request['limit']) ? $request['limit'] : 15;
        $start_date = isset($request['start_date']) ? $request['start_date'] : '';
        $end_date = isset($request['end_date']) ? $request['end_date'] : '';
        if ($start_date && $end_date) {
            $merchandise_report = MerchandiseReport::where('merchandiser_id',auth()->user()->id)->orderBy('created_at', 'desc')->whereBetween('created_at', [$start_date, $end_date])->paginate($limit)->withQueryString();;  
        }else{
            $merchandise_report = MerchandiseReport::where('merchandiser_id',auth()->user()->id)->orderBy('created_at', 'desc')->paginate($limit)->withQueryString();;  
        }
        return $this->responseSuccessWithPaginate('success', MerchandiserReportResource::collection($merchandise_report));
    }
}

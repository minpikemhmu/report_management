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
    public function storeMerchandiseReport(Request $request){
        $reportArray = $request->dataArray;
        if(count($reportArray)>0){
            foreach ($reportArray as $key => $value) {
                $report                    = new MerchandiseReport;
                $report->merchandiser_id   = $value['merchandiser_id'];
                $report->customer_id       = $value['customer_id'];
                $report->merchandiser_report_type_id = $value['merchandiser_report_type_id'];
        
                for ($i = 1; $i <= 20; $i++) {
                    $fieldName = 'field_' . $i;
                    if (isset($value[$fieldName]) && $this->isBase64Image($value[$fieldName])) {
                        $upload_image = $this->imageUploadService->uploadBase64($value[$fieldName], new Image());
                        $report->$fieldName =$upload_image;
                    }else if(isset($value[$fieldName])){
                        $report->$fieldName = $value[$fieldName];
                    }
                }
        
                if(isset($value['latitude'])){
                    $report->latitude  = $value['latitude'];
                }
                if(isset($value['longitude'])){
                    $report->longitude  = $value['longitude'];
                }
                if(isset($value['actual_latitude'])){
                    $report->actual_latitude  = $value['actual_latitude'];
                }
                if(isset($value['actual_longitude'])){
                    $report->actual_longitude  = $value['actual_longitude'];
                }
                $report->save();
            }
        }
        return response(["code"    => 200,
        "status"           => "SUCCESS", 
        "message"          => "Store SuccessFul",
        "data"             => $reportArray,
        ]); 
    }

    public function reportHistory(Request $request)
    {
        $limit = isset($request['limit']) ? $request['limit'] : 15;
        $start_date = isset($request['start_date']) ? $request['start_date'] : '';
        $end_date = isset($request['end_date']) ? $request['end_date'] : '';
        if(auth()->user()->id == 1){
            if ($start_date && $end_date) {
                $merchandise_report = MerchandiseReport::orderBy('created_at', 'desc')->whereBetween('created_at', [$start_date, $end_date])->paginate($limit)->withQueryString();
            }else{
                $merchandise_report = MerchandiseReport::orderBy('created_at', 'desc')->paginate($limit)->withQueryString();;  
            }
        }else{
            if ($start_date && $end_date) {
                $merchandise_report = MerchandiseReport::where('merchandiser_id',auth()->user()->id)->orderBy('created_at', 'desc')->whereBetween('created_at', [$start_date, $end_date])->paginate($limit)->withQueryString();  
            }else{
                $merchandise_report = MerchandiseReport::where('merchandiser_id',auth()->user()->id)->orderBy('created_at', 'desc')->paginate($limit)->withQueryString(); 
            }
        }
        return $this->responseSuccessWithPaginate('success', MerchandiserReportResource::collection($merchandise_report));
    }

    function isBase64Image($data)
    {
        // Check if the data starts with a base64 image header
        return preg_match('/^data:image\/(png|jpeg|jpg|gif);base64,/', $data);
    }
}

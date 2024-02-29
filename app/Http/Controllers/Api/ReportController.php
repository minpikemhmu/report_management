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
use App\Http\Resources\MerchandiserReportDetailResource;
use App\Http\Requests\MrReportHistoryRequest;
use App\Models\MrInputField;
use Illuminate\Support\Facades\DB;

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
        
                for ($i = 1; $i <= 40; $i++) {
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

    public function reportHistory(MrReportHistoryRequest $request)
    {
        $limit = isset($request['limit']) ? $request['limit'] : 15;
        $start_date = isset($request['start_date']) ? $request['start_date'] : '';
        $end_date = isset($request['end_date']) ? $request['end_date'] : '';
        if ($start_date && $end_date) {
            $merchandise_report = MerchandiseReport::where('merchandiser_id',$request->merchandiser_id)->orderBy('created_at', 'desc')->whereBetween('created_at', [$start_date, $end_date])->paginate($limit)->withQueryString();  
        }else{
            $merchandise_report = MerchandiseReport::where('merchandiser_id',$request->merchandiser_id)->orderBy('created_at', 'desc')->paginate($limit)->withQueryString(); 
        }
        return $this->responseSuccessWithPaginate('success', MerchandiserReportResource::collection($merchandise_report));
    }


    public function reportHistoryDetail(Request $request)
    {
        $merchandiser_report_type_id = MerchandiseReport::where('id', $request->merchandiser_report_id)->value('merchandiser_report_type_id');
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
            ->where('merchandise_reports.id', '=', $request->merchandiser_report_id)
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
                        $query->selectRaw("CASE WHEN {$value->active_status} = 1 THEN 'yes' ELSE 'no' END AS {$escapedAlias}");
                    } else {
                        $querySubString = "{$db_name}{$value->identifier} AS {$value->display_name}";
                    }
            
                    if (!empty($querySubString)) {
                        $query->addSelect($querySubString);
                    }
                }
            }
            
        $gedetailtDailyReport = $query->get();
        return $this->responseSuccess('success',new MerchandiserReportDetailResource($gedetailtDailyReport));

    }

    function isBase64Image($data)
    {
        // Check if the data starts with a base64 image header
        return preg_match('/^data:image\/(png|jpeg|jpg|gif);base64,/', $data);
    }
}

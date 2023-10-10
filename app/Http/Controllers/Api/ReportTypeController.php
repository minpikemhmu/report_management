<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BaReportType;
use App\Models\MerchandiserReportType;
use App\Traits\ResponserTraits;
use App\Http\Resources\BaReportTypeResource;
use App\Http\Resources\MerchandiserReportTypeResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\MrInputFieldResource;
use App\Models\MrInputField;

class ReportTypeController extends Controller
{
    use ResponserTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report_types = BaReportType::all();
        return $this->responseSuccess('Success', BaReportTypeResource::collection($report_types));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function merchandiserReportType()
    {
        $report_types = MerchandiserReportType::all();
        return $this->responseSuccess('Success', MerchandiserReportTypeResource::collection($report_types));
    }

    public function fieldsByMerchandiserReportType(Request $request)
    {
       $validator = $this->checkReportType($request->merchandiser_report_type_id);

       // Check if validation fails
       if ($validator->fails()) {
            // Handle the validation failure (e.g., return an error response)
            $errors = $validator->errors()->all();

            return response()->json([
                'code' => 400,
                'message' => 'Validation Error Exception',
                'data' => [],
                'errors' => array_map(function ($error) {
                    return [
                        'key' => $error,
                        'message' => ucfirst($error),
                    ];
                }, $errors),
            ], 400);
       }else{
            $fields = MrInputField::where('merchandiser_report_type_id',$request->merchandiser_report_type_id)->where('active_status',1)->orderBy('display_order')->get();
            return $this->responseSuccess('Success', MrInputFieldResource::collection($fields));
       }
    }

    public function checkReportType($merchandiser_report_type_id){
        // Define validation rules
        $rules = [
            'merchandiser_report_type_id' => 'required|integer|exists:merchandiser_report_types,id',
        ];

        // Create a validator instance
        $validator = Validator::make(['merchandiser_report_type_id' => $merchandiser_report_type_id], $rules);

        return $validator;

    }

}

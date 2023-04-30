<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BaDailyReportCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        dd('here');
        return [
            'data' => $this->collection->map(function ($baDailyReport) {
                return [
                    'id' => $baDailyReport->id,
                    'ba_report_date' => $baDailyReport->ba_report_date,
                    'ba_report_type' => $baDailyReport->baReportType->name,
                    
                    'ba_id' => $baDailyReport->baStaff->id,
                    'ba_code' => $baDailyReport->baStaff->ba_code,
                    'ba_name' => $baDailyReport->baStaff->name,

                    'customer_name' => $baDailyReport->customer->name,
                    'customer_dksh_customer_id' => $baDailyReport->customer->dksh_customer_id,
                    'products' => $baDailyReport->products->map(function ($product) {
                        return [
                            'id' => $product->id,
                            'name' => $product->name,
                            'count' => $product->count,
                        ];
                    }),
                ];
            }),
        ];
    }
}

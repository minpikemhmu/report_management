<?php

namespace App\Http\Resources;

use App\Models\BaDailyReportProduct;
use Illuminate\Http\Resources\Json\JsonResource;

class BaDailyReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Retrieve all BaDailyReportProduct records related to the current BaDailyReport instance
        $reportProducts = BaDailyReportProduct::where('ba_daily_report_id', $this->id)->get();
        
        // Create a collection of BaDailyReportProductResource instances
        $productResources = $reportProducts->map(function ($product) {
            return new BaDailyReportProductResource($product);
        });
        // dd($productResources);

        return [
            'id' => $this->id,
            'ba_report_date' => $this->ba_report_date,
            'bastaff_name' => $this->baStaff->name,
            'customer_name' => $this->customer->name,
            'ba_report_type' => $this->baReportType->name,
            'products' => $productResources,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

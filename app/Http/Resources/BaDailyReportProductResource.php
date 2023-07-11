<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaDailyReportProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ba_daily_report_id' =>$this->ba_daily_report_id,
            'product_name'=> $this->product->name,
            'count' => $this->count,
            'manufacture_date' => $this->manufacture_date,
            'expiry_date' => $this->expiry_date,
        ];
    }
}

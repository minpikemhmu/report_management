<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MerchandiserReportResource extends JsonResource
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
            'merchandiser_name' => $this->merchandiser->name,
            "customer_name" => $this->customer->name,
            "gondolar_type" => $this->gondolar_type->name,
            "trip_type" => $this->trip_type->name,
            "outskirt_type" => $this->outskirt_type->name,
            "merchandiser_report_type" => $this->merchandiser_report_type->name ?? null,
            "qty" => $this->qty,
            "gondolar_size_inches_length" => $this->gondolar_size_inches_length,
            "gondolar_size_inches_weight" => $this->gondolar_size_inches_weight,
            "gondolar_size_centimeters_length" => $this->gondolar_size_centimeters_length,
            "gondolar_size_centimeters_weight" => $this->gondolar_size_centimeters_weight,
            "backlit_size_inches_length" => $this->backlit_size_inches_length,
            "backlit_size_inches_weight" => $this->backlit_size_inches_weight,
            "backlit_size_centimeters_length"=> $this->backlit_size_centimeters_length,
            "backlit_size_centimeters_weight"=> $this->backlit_size_centimeters_weight,
            "outlet_photo_before"=> $this->outlet_photo_before,
            "outlet_photo_after"=> $this->outlet_photo_after,
            "remark" => $this->remark,
            "latitude"=> $this->latitude,
            "longitude"=> $this->longitude,
            "actual_latitude"=> $this->actual_latitude,
            "actual_longitude"=> $this->actual_longitude,
            "planogram"=> isset($this->planogram) ? $this->planogram==1 ? "Yes" : "No" : null,
            "hygiene"=> isset($this->hygiene) ? $this->hygiene==1 ? "Yes" : "No" : null,
            "sale_team_visit"=> isset($this->sale_team_visit) ? $this->sale_team_visit==1 ? "Yes" : "No" : null,
            "outlet_status"=> $this->outlet_status,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];

        
    }
}

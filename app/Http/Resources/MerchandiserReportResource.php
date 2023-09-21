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
            'merchandiser_report_type' => $this->merchandiser_report_type->name,
            'merchandiser_name' => $this->merchandiser->name,
            "customer_name" => $this->customer->name,
            "latitude"=> $this->latitude,
            "longitude"=> $this->longitude,
            "actual_latitude"=> $this->actual_latitude,
            "actual_longitude"=> $this->actual_longitude,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];

        
    }
}

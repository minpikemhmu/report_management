<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CustomerResource;

class BastaffResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $BaLatestAttendance = $this->attendances()->latest('created_at')->first();
        if($BaLatestAttendance != null){
            $latest_date = $BaLatestAttendance->created_at->format('Y-m-d');
            $today = date("Y-m-d");
            if($today==$latest_date){
                $check_out_status = 1;
            }else{
                $check_out_status = $BaLatestAttendance->is_check_out;
            }
        }
        return [
            'id'                   => $this->id,
            'name'                 => $this->name,
            'code'                 => $this->ba_code,
            'supervisor_id'        => $this->supervisor_id,
            'supervisor_name'      => $this->supervisor->name,
            'customer'             => new CustomerResource($this->customer),
            'product_brand_id'     => $this->product_brand_id,

            'city_id'              => $this->city_id,
            'city_name'            => $this->city->name,

            'channel_id'           => $this->channel_id,
            'channel_name'         => $this->channel->name,

            'subchannel_id'        => $this->subchannel_id,
            'subchannel_name'      => $this->subchannel->name,
            'role'                 => "BaStaff",
            'latest_check_out_status' => $BaLatestAttendance == null ? null : $check_out_status,
        ];
    }
}

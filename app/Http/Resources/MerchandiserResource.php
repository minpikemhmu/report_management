<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class MerchandiserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $MerchandiserLatestAttendance = $this->attendances()->latest('created_at')->first();
        if($MerchandiserLatestAttendance != null){
            $latest_date = $MerchandiserLatestAttendance->created_at->format('Y-m-d');
            $today = date("Y-m-d");
            if($today==$latest_date){
                $check_out_status = 1;
            }else{
                $check_out_status = $MerchandiserLatestAttendance->is_check_out;
            }
        }
        return [
            'id'                   => $this->id,
            'name'                 => $this->name,
            'code'                 => $this->mer_code,
            'region_id'            => $this->region_id,
            'region_name'          => $this->region->name,

            'merchant_team_id'     => $this->merchant_team_id,
            'merchant_team_name'   => $this->merchantTeam->name,

            'merchant_area_id'     => $this->merchant_area_id,
            'merchant_area_name'   => $this->merchantArea->name,

            'channel_id'           => $this->channel_id,
            'channel_name'         => $this->channel->name,
            'role'                 => "Merchandiser",
            'latest_check_out_status' => $MerchandiserLatestAttendance == null ? null : $check_out_status,
        ];
    }
}

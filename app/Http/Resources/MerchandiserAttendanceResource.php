<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MerchandiserAttendanceResource extends JsonResource
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
            'staff_id' => $this->staff_id,
            'is_check_in' => $this->is_check_in,
            'is_check_out' => $this->is_check_out,
            'is_attendance' => $this->is_attendance,
            'check_in_time' => $this->check_in_time ?? Carbon::parse($this->check_in_time)->format('Y-m-d H:i:s'),
            'check_out_time' => $this->check_out_time ? Carbon::parse($this->check_out_time)->format('Y-m-d H:i:s') : null,
        ];
    }
}

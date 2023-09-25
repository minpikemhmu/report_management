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
        ];
    }
}

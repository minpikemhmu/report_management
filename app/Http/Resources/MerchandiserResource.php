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
        ];
    }
}

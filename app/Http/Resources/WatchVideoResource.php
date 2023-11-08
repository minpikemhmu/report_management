<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CustomerResource;

class WatchVideoResource extends JsonResource
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
            'video_id'           => $this->video_id,
            'merchandiser_id'    => $this->merchandiser_id,
            'bastaff_id'         => $this->bastaff_id,
        ];
    }
}

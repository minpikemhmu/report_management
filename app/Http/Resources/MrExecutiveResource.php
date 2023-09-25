<?php

namespace App\Http\Resources;

use App\Models\MrSupervisor;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class MrExecutiveResource extends JsonResource
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
            'code'                 => $this->code,
            'role'                 => "Executive",
        ];
    }
}

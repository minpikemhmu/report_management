<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaAssignResource extends JsonResource
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
            'ba_staff_id' => $this->ba_staff_id,
            'product_key_category_id' => $this->product_key_category_id,
            'target_quantity' => $this->target_quantity,
            'month' => $this->month,
            'year' => $this->year,
            'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}

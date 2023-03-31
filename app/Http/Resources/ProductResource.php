<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            "product_code" => $this->product_code,
            "brn_code" => $this->brn_code,
            "product_brands_id" => $this->product_brands_id,
            "product_category_id" => $this->product_category_id,
            "product_key_category_id" => $this->product_key_category_id,
            "product_sub_category_id" => $this->product_sub_category_id,
            "size" => $this->product_sub_category_id,
        ];

        
    }
}

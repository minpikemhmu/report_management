<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignCustomerListsResource extends JsonResource
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
            'dksh_customer_id'     => $this->dksh_customer_id,
            'customer_name'        => $this->name,
            'address'              => $this->address,
            'phone_number'         => $this->phone_number,
            'division'             => $this->division_state->name,
            'township'             => $this->township->name,
            'city'                 => $this->city->name,
            'customer_type'        => $this->customer_type->name,
            'assign_date'          => $this->pivot->assign_date,
            'assign_day'           => date('l', strtotime($this->pivot->assign_date)),
        ];
    }
}

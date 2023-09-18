<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class MrInputFieldResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $list_format = null;
        if(isset($this->list_data)){
            // Retrieve all data from the "$this->list_data" table
            $list_data = DB::table($this->list_data)->get();

            // Format the data as JSON
            $list_format = $list_data->map(function ($list) {
                return [
                    'id' => $list->id,
                    'name' => $list->name,
                ];
            });
        }
        return [
            'id'                => $this['id'],
            'display_name'      => $this['display_name'],
            'identifier'        => $this->identifier,
            'display_order'     => $this->display_order, 
            'field_type'        => $this->field_type, 
            'is_required'       => $this->isRequired, 
            'list_data'         => $list_format,
        ];
    }
}

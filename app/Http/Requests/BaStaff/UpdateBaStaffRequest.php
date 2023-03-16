<?php

namespace App\Http\Requests\BaStaff;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBaStaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ba_code' => "string|unique:outlets,outlet_id," .$this->route('bastaff'),
            'name' => "string",
            'supervisor_id' => "integer|exists:supervisors,id",
            'city_id' => "integer|exists:cities,id",
            'customer_id' => "integer|exists:customers,id",
            'channel_id' => "integer|exists:channels,id",
            'subchennel_id' => "integer|exists:sub_channels,id",
            'password' => "string|between:8,50|nullable"
        ];
    }
}

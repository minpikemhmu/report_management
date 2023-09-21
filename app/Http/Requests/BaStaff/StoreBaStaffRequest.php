<?php

namespace App\Http\Requests\BaStaff;

use Illuminate\Foundation\Http\FormRequest;

class StoreBaStaffRequest extends FormRequest
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
            'ba_code' => "required|string|unique:ba_staffs",
            'name' => "required|string",
            'supervisor_id' => "required|integer|exists:supervisors,id",
            'city_id' => "required|integer|exists:cities,id",
            'customer_id' => "required|integer|exists:customers,id",
            'product_brand_id' => "required|integer|exists:product_brands,id",
            'channel_id' => "required|integer|exists:channels,id",
            'subchannel_id' => "required|integer|exists:sub_channels,id",
            'password' => "required|string|between:8,50"
        ];
    }
}

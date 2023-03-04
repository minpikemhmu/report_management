<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreCustomerRequest extends FormRequest
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
            'name'                     => "required|string",
            'customer_id'              => "required|string",
            'address'                  => "required|string",
            'phone_number'             => "required|numeric|unique:customers,phone_number,NULL,id,deleted_at,NULL|digits_between:8,11",
            'customer_type'            => "required|integer|exists:customer_types,id",
            'total_frequency'          => "required|integer",
            'division'                 => "required|integer|exists:division_states,id",
            'township'                 => "required|integer|exists:townships,id",
            'city'                     => "required|integer|exists:cities,id",
        ];
    }
}

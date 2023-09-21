<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBaSupervisorRequest extends FormRequest
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
            'name' => "required|string",
            'code' => "required|string|unique:supervisors",
            'password' => "required|string|between:8,50",
            'executive_id' => "required|integer|exists:ba_executives,id",
            'region_id' => "required|integer|exists:regions,id",
        ];
    }
}

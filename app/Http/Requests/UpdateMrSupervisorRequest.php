<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMrSupervisorRequest extends FormRequest
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
            'name' => "string",
            'code' => "string|unique:mr_supervisors,code,{$this->id}",
            'password' => "string|between:8,50|nullable",
            'executive_id' => "nullable|integer|exists:mr_executives,id",
        ];
    }
}

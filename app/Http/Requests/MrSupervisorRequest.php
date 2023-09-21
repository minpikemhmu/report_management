<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MrSupervisorRequest extends FormRequest
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
            'executive_id' => "required|integer|exists:mr_executives,id",
        ];
    }
}

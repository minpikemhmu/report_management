<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaAttendanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'is_check_in' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'is_check_in.required' => 'The check-in field is required.',
            'is_check_in.boolean' => 'The check-in field must be a boolean value.',
        ];
    }
}

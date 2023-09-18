<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldRequest extends FormRequest
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
        $fieldId = $this->route('mr_input_field'); // Assuming the route parameter is named 'field'
        return [
            'merchandiser_report_type_id' => 'required|integer|exists:merchandiser_report_types,id',
            'display_name' => 'required|string',
            'display_order' => 'required|integer|unique:mr_input_fields,display_order,' . $fieldId . ',id,merchandiser_report_type_id,' . $this->input('merchandiser_report_type_id'),
            'field_type' => 'required|string',
            'isRequired' => 'required|boolean',
            'active_status' => 'required|boolean',
        ];
    }
}

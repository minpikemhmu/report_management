<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFieldRequest extends FormRequest
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
        $rules = [
            'merchandiser_report_type_id' => 'required|integer|exists:merchandiser_report_types,id',
            'display_name' => 'required|string',
            'display_order' => 'required|integer',
            'field_type' => 'required|string',
            'isRequired' => 'required|boolean',
            'active_status' => 'required|boolean',
        ];
    
        // Get the dynamic value of merchandiser_report_type_id
        $merchandiserReportTypeId = $this->input('merchandiser_report_type_id');

        // Check if merchandiser_report_type_id is the same as the given value
        $rules['display_order'] = 'required|integer|unique:mr_input_fields,display_order,NULL,id,merchandiser_report_type_id,' . $merchandiserReportTypeId;

        return $rules;
    }
}

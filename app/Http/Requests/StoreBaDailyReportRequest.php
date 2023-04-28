<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBaDailyReportRequest extends FormRequest
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
            'ba_report_date' => 'required|date',
            'bastaff_id' => 'required|exists:ba_staffs,id',
            'customer_id' => 'required|exists:customers,id',
            'ba_report_type_id' => 'required|exists:ba_report_types,id',
            'products' => 'nullable|array',
            'products.*.product_id' => 'required_with:products|exists:products,id',
            'products.*.count' => 'required_with:products|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'products.*.product_id.required_with' => 'The product ID field is required when adding products',
            'products.*.count.required_with' => 'The count field is required when adding products',
        ];
    }
}

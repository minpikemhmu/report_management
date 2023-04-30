<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBaDailyReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ba_report_date' => 'sometimes|required|date',
            'bastaff_id' => 'sometimes|required|exists:ba_staffs,id',
            'customer_id' => 'sometimes|required|exists:customers,id',
            'ba_report_type_id' => 'sometimes|required|exists:ba_report_types,id',
            'products.*.product_id' => 'sometimes|required|exists:products,id',
            'products.*.count' => 'sometimes|required|string|min:1',
        ];
    }
}

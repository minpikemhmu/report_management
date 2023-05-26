<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBaAssignRequest extends FormRequest
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
            'ba_staff_id' => 'required|exists:ba_staffs,id',
            'product_key_category_id' => 'required|exists:product_key_categories,id',
            'target_quantity' => 'required|numeric',
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|digits:4',
        ];
    }

    public function messages()
    {
        return [
            'ba_staff_id.required' => 'Need to choose BA staff to assign.',
            'ba_staff_id.exists' => 'The selected BA staff does not exist.',
            'product_key_category_id.required' => 'Need to choose the Product Key Category.',
            'product_key_category_id.exists' => 'The selected product key category does not exist.',
            'target_quantity.required' => 'The target quantity is required.',
            'target_quantity.numeric' => 'The target quantity must be a numeric value.',
            'month.required' => 'Need to choose the assign month.',
            'month.integer' => 'The month must be an integer.',
            'month.between' => 'The month must be between 1 and 12.',
            'year.required' => 'Need to type the assign year.',
            'year.integer' => 'The year must be an integer.',
            'year.digits' => 'The year must be a four-digit number.',
        ];
    }
}

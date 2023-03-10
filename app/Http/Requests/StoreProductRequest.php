<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'product_code' => "required|string|unique:products,product_code,except,id", 
            'brn_code' => 'required|string|unique:products,brn_code,except,id', 
            'product_brands_id' => "required|integer|exists:product_brands,id", 
            'product_category_id' => "required|integer|exists:product_categories,id", 
            'product_sub_category_id' => "required|integer|exists:product_sub_categories,id",
            'size' => "required|string",
        ];
    }
}

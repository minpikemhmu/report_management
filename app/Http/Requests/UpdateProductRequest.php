<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product_code' => "string|unique:products,product_code," .$this->route('product')->id, 
            'brn_code' => 'nullable|string|unique:products,brn_code,' .$this->route('product')->id, 
            'product_brands_id' => "integer|exists:product_brands,id", 
            'product_category_id' => "nullable|integer|exists:product_categories,id", 
            'product_key_category_id' => "nullable|integer|exists:product_key_categories,id",
            'product_sub_category_id' => "nullable|integer|exists:product_sub_categories,id",
            'size' => "nullable|string",
            'price' => 'sometimes|required|digits_between:1,10|numeric',
        ];
    }
}

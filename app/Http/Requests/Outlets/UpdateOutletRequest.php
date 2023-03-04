<?php

namespace App\Http\Requests\Outlets;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOutletRequest extends FormRequest
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
            'outlet_id' => "string|unique:outlets,outlet_id," .$this->route('outlet')->id,
            'name' => "string",
        ];
    }
}

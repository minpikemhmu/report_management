<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateMerchandiserRequest extends FormRequest
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
            'name'                     => "required|string",
            'code'                     => "required|string",
            'region'                   => "required|integer",
            'team'                     => "required|integer",
            'area'                     => "required|integer",
            'channel'                  => "required|integer",
        ];
    }
}

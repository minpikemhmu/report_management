<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class MerchandiserReportRequest extends FormRequest
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
            'merchandiser_id'                     => "required|integer|exists:merchandisers,id",
            'customer_id'                         => "required|integer|exists:customers,id",
            'gondolar_type_id'                    => "required|integer|exists:gondolar_types,id",
            'trip_type_id'                        => "required|integer|exists:trip_types,id",
            'outskirt_type_id'                    => "required|integer|exists:outskirt_types,id",
            'qty'                                 => "nullable|string",
            'gondolar_size_inches_length'         => "nullable|string",
            'gondolar_size_inches_weight'         => "nullable|string",
            'gondolar_size_centimeters_length'    => "nullable|string",
            'gondolar_size_centimeters_weight'    => "nullable|string",
            'backlit_size_inches_length'          => "nullable|string",
            'backlit_size_inches_weight'          => "nullable|string",
            'backlit_size_centimeters_length'     => "nullable|string",
            'backlit_size_centimeters_weight'     => "nullable|string",
            'outlet_photo_before'                 => "nullable|string",
            'outlet_photo_after'                  => "nullable|string",
            'remark'                              => "nullable|string",
        ];
    }
}

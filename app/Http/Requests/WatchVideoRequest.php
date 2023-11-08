<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WatchVideoRequest extends FormRequest
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
            'merchandiser_id'   => "integer|exists:merchandisers,id",
            'mr_supervisor_id'  => "integer|exists:mr_supervisors,id",
            'mr_executive_id'   => "integer|exists:mr_executives,id",
            'bastaff_id'        => "integer|exists:ba_staffs,id",
            'supervisor_id'     => "integer|exists:supervisors,id",
            'ba_executive_id'   => "integer|exists:ba_executives,id",
            'video_id'          => "required|integer|exists:videos,id",
        ];
    }
}

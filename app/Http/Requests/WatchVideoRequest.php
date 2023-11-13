<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;

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

    protected function withValidator($validator)
    {
        $validator->after(function (Validator $validator) {
            $this->validateUniqueCombination($validator);
        });
    }

    protected function validateUniqueCombination(Validator $validator)
    {
        $merchandiserId = $this->input('merchandiser_id');
        $bastaffId = $this->input('bastaff_id');
        $videoId = $this->input('video_id');

        $existingRecord = DB::table('user_video')
            ->where(function ($query) use ($merchandiserId, $videoId) {
                $query->where('merchandiser_id', $merchandiserId)
                    ->where('video_id', $videoId);
            })
            ->orWhere(function ($query) use ($bastaffId, $videoId) {
                $query->where('bastaff_id', $bastaffId)
                    ->where('video_id', $videoId);
            })
            ->first();

        if ($existingRecord) {
            $validator->errors()->add('unique_combination', 'The combination of merchandiser/bastaff and video is not unique.');
        }
    }
}

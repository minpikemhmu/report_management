<?php

namespace App\Http\Requests;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class ImageUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'required|string'
        ];
    }

    /**
     * @param string $image_url
     * @param string $thumbnail_url
     * @return Image
     */
    public function toImage(string $image_url): Image
    {
        $image = new Image();
        $image->image_url = $image_url;
        $image->thumbnail_url = $image_url;

        return $image;
    }
}

<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ImageUploadService
{
    /**
     * @param $files
     * @param Model $model
     * @return array
     */
    public function deleteImages(array|null $deleteImages): void
    {
        if ($deleteImages !== null && count($deleteImages) > 0)
        {
            foreach ($deleteImages as $image) {
                Storage::disk('digitalocean')->delete(str_replace('https://th-telemedic-space.sgp1.digitaloceanspaces.com/', '', $image));
                Image::where('image_url', $image)->delete();
            }
        }
    }

    public function uploadBase64(string $file, Model $model): string
    {
        $extension = explode('/', explode(':', substr($file, 0, strpos($file, ';')))[1])[1];

        $fileName = (string)Str::random(20) . '.' . $extension;

        $folder = class_basename($model);

        $path = $model->id && $model->id != "" ? "Images/{$folder}/{$model->id}" : "Images/{$folder}";

        $replace = substr($file, 0, strpos($file, ',')+1);

        $image = str_replace($replace, '', $file);

        $image = str_replace(' ', '+', $image);

        $filePath = $path . "/" . $fileName;

        Storage::disk('digitalocean')->put(
            $filePath,
            base64_decode($image),
            'public'
        );

        return Storage::disk('digitalocean')->url($filePath);
    }
}

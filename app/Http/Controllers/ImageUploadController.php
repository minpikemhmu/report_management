<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageDeleteRequest;
use App\Http\Requests\ImageUploadRequest;
use App\Models\Image;
use App\Services\ImageUploadService;
use App\Traits\ResponserTraits;
use Illuminate\Http\JsonResponse;

class ImageUploadController extends Controller
{
    use ResponserTraits;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }
    /**
     * @param ImageUploadRequest $request
     * @return JsonResponse
     */
    public function uploadImage(ImageUploadRequest $request): JsonResponse
    {
        $data = $request->validated();

        $upload_image = $this->imageUploadService->uploadBase64($data['image'], new Image());

        $to_image = $request->toImage($upload_image);

        $to_image->save();

        return $this->responseCreated([
            'image' => $upload_image
        ]);
    }

    /**
     * @param ImageDeleteRequest $request
     * @return JsonResponse
     */
    public function deleteImages(ImageDeleteRequest $request): JsonResponse
    {
        $data = $request->validated();

        $this->imageUploadService->deleteImages($data['images']);

        return $this->responseSuccess('success');
    }
}

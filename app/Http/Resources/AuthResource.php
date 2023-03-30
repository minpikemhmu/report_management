<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    protected Model $model;

    protected string|null $token;

    public function __construct(Model $model, string|null $token)
    {
        $this->token = $token;
        parent::__construct($model);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $response = [
            "token" => $this->token
        ];

        if (request()->status === "merchandiser") {
            $response['merchandiser'] = new MerchandiserResource($this);
        }

        if (request()->status === "bastaff") {
            $response['bastaff'] = new BastaffResource($this);
        }

        return $response;
    }
}

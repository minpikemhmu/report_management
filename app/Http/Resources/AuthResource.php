<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Merchandiser;
use App\Models\MrSupervisor;
use App\Models\MrExecutive;
use App\Models\BaStaff;
use App\Models\BaExecutive;
use App\Models\Supervisor;
use Illuminate\Support\Facades\Auth;

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
        $modelName = class_basename($this->resource);
        if (request()->status === "merchandiser") {
            if($modelName == "MrExecutive"){
                $response['merchandiser'] = new MrExecutiveResource($this);
            }else if($modelName == "MrSupervisor"){
                $response['merchandiser'] = new MrSupervisorResource($this);
            }else{
                $response['merchandiser'] = new MerchandiserResource($this);
            }  
        }
        if (request()->status === "bastaff") {
            if($modelName == "BaExecutive"){
                $response['bastaff'] = new BaExecutiveResource($this);
            }else if($modelName == "Supervisor"){
                $response['bastaff'] = new BaSupervisorResource($this);
            }else{
                $response['bastaff'] = new BastaffResource($this);
            }  
        }

        return $response;
    }
}

<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Traits\ResponserTraits;

class AuthApiController extends Controller
{
    use ResponserTraits;
    public function login(LoginRequest $request)
    {
        $auth = $request->authenticate();
        $token = null;
        $token = $auth->createToken($request->validated('status'))->plainTextToken;

        return $this->responseSuccess('Success', new AuthResource($auth, $token));
    }
}

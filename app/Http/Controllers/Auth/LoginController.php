<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseCodes;

final class LoginController extends AuthController
{
    /**
     * @param \App\Http\Requests\LoginRequest $request
     * @return \App\Http\Resources\UserResource|\Illuminate\Http\JsonResponse
     */
    public function __invoke(LoginRequest $request): UserResource|JsonResponse
    {
        $credentials = $request->validated();

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => __('auth.failed')], ResponseCodes::HTTP_UNAUTHORIZED);
        }

        return (new UserResource(auth()->user()))->additional([
            'meta' => $this->withToken($token),
        ]);
    }
}

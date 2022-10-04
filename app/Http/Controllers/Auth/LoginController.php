<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseCodes;


class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\LoginEmployeeRequest $request
     * @return \App\Http\Resources\EmployeeResource
     */
    public function login(LoginEmployeeRequest $request): EmployeeResource
    {
        /** @var string|false $token */
        $token = auth()->attempt($request->validated());

        if (!$token)
            abort(response()->json([
                'message' => 'Invalid credentials',
            ], ResponseCodes::HTTP_UNAUTHORIZED));

        return (new EmployeeResource(auth()->user()))->additional([
            'meta' => $this->tokenConfiguration($token)
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request): Response
    {
        auth()->logout();

        return response()->noContent();
    }

    private function tokenConfiguration($token): array
    {
        return [
            'token_type' => 'Bearer',
            'token_expires_in' => auth()->factory()->getTTL() * 60,
            'access_token' => $token,
        ];
    }
}

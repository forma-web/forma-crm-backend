<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use JetBrains\PhpStorm\ArrayShape;

abstract class AuthController extends Controller
{
    /**
     * @param string $token
     * @return array
     */
    #[ArrayShape(['access_token' => 'string', 'token_type' => 'string', 'expires_in' => 'int'])]
    protected function withToken(string $token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}

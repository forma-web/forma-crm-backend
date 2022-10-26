<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Response;

final class LogoutController extends AuthController
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function __invoke(): Response
    {
        auth()->logout();
        return response()->noContent();
    }
}

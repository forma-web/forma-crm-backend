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
        $credentials = collect($request->validated());
        $mainCredentials = $credentials->except('device')->all();

        if (! auth()->attempt($mainCredentials))
            abort(ResponseCodes::HTTP_FORBIDDEN);

        if ($request->hasSession()) {
            $request->session()->put('auth.password_confirmed_at', time());
        }

        $request->session()->regenerate();

        return new EmployeeResource(auth()->user());
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

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}

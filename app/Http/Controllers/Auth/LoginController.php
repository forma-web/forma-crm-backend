<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\LoginEmployeeRequest $request
     * @return \App\Http\Resources\EmployeeResource
     */
    public function __invoke(LoginEmployeeRequest $request): EmployeeResource
    {
        $credentials = collect($request->validated());
        $mainCredentials = $credentials->except('device')->all();

        if (! auth()->attempt($mainCredentials))
            abort(Response::HTTP_FORBIDDEN);

        $token = auth()->user()->createToken('auth-token', $credentials->get('device'))->plainTextToken;

        return (new EmployeeResource(auth()->user()))->additional([
            'token' => $token,
        ]);
    }
}

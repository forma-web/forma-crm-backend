<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class RegistrationController extends AuthController
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\StoreUserRequest $request
     * @return \App\Http\Resources\UserResource
     */
    public function __invoke(StoreUserRequest $request): UserResource
    {
        $credentials = collect($request->validated());

        $newEmployee = User::create(
            $credentials
                ->replaceByKey('password', fn ($p) => Hash::make($p))
                ->all()
        );

        /** @var string $token */
        $token = auth()->login($newEmployee);

        return (new UserResource($newEmployee))->additional([
            'meta' => $this->withToken($token)
        ]);
    }
}

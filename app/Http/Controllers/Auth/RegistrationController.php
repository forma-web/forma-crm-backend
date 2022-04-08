<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\StoreEmployeeRequest $request
     * @return \App\Http\Resources\EmployeeResource
     */
    public function __invoke(StoreEmployeeRequest $request): EmployeeResource
    {
        $credentials = collect($request->validated());

        $newEmployee = Employee::create(
            $credentials
                ->replaceByKey('password', fn ($p) => Hash::make($p))
                ->except('device')
                ->all()
        );

        $token = $newEmployee->createToken('auth-token', $credentials->get('device'))->plainTextToken;

        return (new EmployeeResource($newEmployee))->additional([
            'token' => $token,
        ]);
    }
}

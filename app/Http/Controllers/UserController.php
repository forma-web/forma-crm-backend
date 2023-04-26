<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate([
            'email' => $data['email'],
        ], $data);

        return response()->noContent(201);
    }

    public function setPosition(Request $request, int $user_id): \Illuminate\Http\JsonResponse
    {
        $id_position = $request->get('id_position');
        $user = User::find($user_id);
        $user->id_position = $id_position;
        $user->save();

        return response()->json($user);
    }
}

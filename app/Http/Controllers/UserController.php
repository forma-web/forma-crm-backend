<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __invoke(UserRequest $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'name' => 'required'
        ]);
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate([
            'email' => $data['email'],
        ], $data);
        return response("пользователь зарегистрирован");
    }

    public function setPosition(Request $request){
        $id_position = $request->get('id_position');
        $id_user = $request->get('id_user');
        $user = User::find($id_user);
        $user->id_position = $id_position;
        $user->save();
        return response()->json($user);
    }
}

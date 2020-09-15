<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $user = new User([
            'email'    => $request->email,
            'name'     => $request->name,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        $token = $user->createToken('authToken')->accessToken;
        return response()->json([
            'ok'    => true,
            'user'  => $user,
            'token' => $token
        ]);
    }

    public function login(UserLoginRequest $request)
    {
        $data = $request->only('email', 'password');
        if (!Auth::attempt($data)) {
            return response()->json([
                'ok'      => false,
                'mensaje' => 'Error de credenciales'
            ]);
        }
        $token = Auth::user()->createToken('authToken')->accessToken;
        return response()->json([
            'ok'    => true,
            'user'  => Auth::user(),
            'token' => $token
        ]);
    }


    public function me()
    {
        return response()->json([
            'ok'    => true,
            'user'  => Auth::user()
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
             return \httpResponse(['token' => Auth::user()->createToken(\env('TOKEN_NAME'))->plainTextToken]);
        }

        return \httpResponse([], __('Login ou senha inválido!'), false, 400);

    }
}

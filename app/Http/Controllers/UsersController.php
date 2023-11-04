<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return ['token' => $user->createToken($user->name)->plainTextToken];
        }

        return response('Unauthorized.', 401);
    }

    public function me(Request $request)
    {
        return $request->user();
    }
}

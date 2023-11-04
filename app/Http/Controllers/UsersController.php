<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        return response()->json(['message' => 'Unauthorized.'], 401);
    }

    public function me(Request $request)
    {
        return $request->user();
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|max:255',
            'email' => 'sometimes|max:255',
            'dni' => 'sometimes|max:15',
            'phone' => 'sometimes|max:15',
            'address' => 'sometimes|max:255',
            'password' => 'sometimes|max:255'
        ]);

        if (!$validator->fails()) {
            $updateUser = $request->user();
            $updateUser->setAttribute('name', $request->name);
            $updateUser->setAttribute('email', $request->email);
            $updateUser->setAttribute('dni', $request->dni);
            $updateUser->setAttribute('phone', $request->phone);
            $updateUser->setAttribute('address', $request->address);
            $updateUser->setAttribute('password', Hash::make($request->password));
            $updateUser->save();

            return $updateUser;
        }

        return response()->json(['message' => 'Wrong request, the data sent does not comply with the rules.'], 400);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|max:255',
            'email' => 'sometimes|max:255',
            'dni' => 'sometimes|max:15',
            'phone' => 'sometimes|max:15',
            'address' => 'sometimes|max:255'
        ]);

        if (!$validator->fails()) {
            $createUser = new User();
            $createUser->setAttribute('name', $request->name);
            $createUser->setAttribute('email', $request->email);
            $createUser->setAttribute('dni', $request->dni);
            $createUser->setAttribute('phone', $request->phone);
            $createUser->setAttribute('address', $request->address);
            $createUser->setAttribute('password', Hash::make('prueba123'));
            $createUser->save();

            return $createUser;
        }

        return response()->json(['message' => 'Wrong request, the data sent does not comply with the rules.'], 400);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", "unique:users"],
            "password" => ["reqired", "confirmed", "min:8"]
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->name),
        ]);

        $token = $user->createToken('user');

        return [
            "user" => $user,
            "token" => $token
        ];
    }

    public function login(Request $request) {}

    public function logout(Request $request) {}
}

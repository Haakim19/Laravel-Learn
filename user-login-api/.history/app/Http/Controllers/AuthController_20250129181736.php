<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PDO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        $accessToken = $user->createToken('API Token')->plainTextToken;

        //Set cookie with Access Token
        $cookie = cookie('user_token', $accessToken, 60, null,);
        return response()->json(['message' => 'Login Successful', 'token' => $accessToken], 200)
            ->cookie($cookie);
    }

    public function register(Request $request)
    {
        //validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|confirmed'
        ]);

        //create a new user
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->save();

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $cookie = Cookie::forget('user_token');
        return response()->json([
            'message' => 'Logged out'
        ])->withCookie($cookie);
    }
}

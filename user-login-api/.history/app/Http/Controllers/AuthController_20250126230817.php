<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PDO;

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
        $token = $user->createToken('API Token')->plainTextToken;

        $cookie = cookie('user_session', $token, 60);
        return response()->json(['message' => 'Login Successful', 'access_token' => $token], 200)
            ->cookie($cookie);
    }
    public function register(Request $request)
    {
        //validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|email|max:255',
            'password' => 'required|min:8|confirmed'
        ]);

        //create a new user
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }
}

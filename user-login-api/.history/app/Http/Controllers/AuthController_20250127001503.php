<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PDO;
use Illuminate\Support\Facades\Auth;

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
        // $token = $user->createToken('API Token')->plainTextToken;
        Auth::login($user);
        //Set session variable
        $request->session()->put('user', $user->email);

        //Set cookie with user email
        $cookie = cookie('user_session', $user->email, 60);
        return response()->json(['message' => 'Login Successful'], 200)
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
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $cookie = cookie('user_session', null, -1);
        return response()->json(['message' => 'Logged out'], 200)
            ->cookie($cookie);
    }
    public function checkSession(Request $request)
    {
        $cookie = $request->cookie('user_session');
        if ($cookie) {
            return response()->json(['message' => 'Session Active'], 200);
        } else {
            return response()->json(['message' => 'Session Inactive'], 401);
        }
    }
}

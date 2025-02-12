<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = \App\Models\User::where('email', $request->email)->first();
        if (!$user) {
            throw ValidationException::withMessage([
                'email' => ['The Provided Credentials are incorrect ']
            ]);
        }
    }
}

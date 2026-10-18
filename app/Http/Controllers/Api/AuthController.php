<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    public function login(Request $request) {
        $validatedRequest = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (!Auth::attempt($validatedRequest)) {
            return response([
                'message' => 'Email or password is invalid',
            ], 422);
        
        }

        $user = Auth::user();
        $token = $user->createToken('mainToken')->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token
        ]);


    }
}

<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'phone_number' => 'required|string',
            'apartment_number' => 'required|string',
            'password' => 'required|string|min:6',
            'file' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $path = $request->file('file')->store('uploads', 'public');

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'apartment_number' => $request->apartment_number,
            'file' => $path,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully!'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials.'], 401);
        }

        if (!$user->is_verified) {
            return response()->json(['message' => 'Your account is pending verification.'], 403);
        }

        $token = $user->createToken('token_name')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    public function verifyUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_verified = true;
        $user->save();

        return response()->json(['message' => 'User verified successfully!'], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully!'], 200);
    }
}

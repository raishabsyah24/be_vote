<?php

// app/Http/Controllers/AdminController.php
namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return response()->json($users, 200);
    }


    public function getUnverifiedUsers()
    {
        $unverifiedUsers = User::where('is_verified', false)->get(); // Mengambil pengguna yang belum diverifikasi
        return view('admin.unverified-users', compact('unverifiedUsers'));
    }


    public function verifyUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->withErrors('User not found.');
        }

        $user->is_verified = 1;
        $user->save();

        return redirect()->back()->with('success', 'User has been verified.');
    }
}

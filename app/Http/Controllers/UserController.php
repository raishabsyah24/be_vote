<?php

namespace App\Http\Controllers;


use App\Models\User; // Pastikan model User diimport
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua pengguna
        return view('users.index', compact('users')); // Mengirim data pengguna ke tampilan
    }

    public function verifyUser($id)
    {
        // Mencari user berdasarkan ID
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->withErrors('User not found.');
        }

        // Mengubah is_verified menjadi 1
        $user->is_verified = 1;
        $user->save();

        return redirect()->back()->with('success', 'User has been verified.');
    }
}

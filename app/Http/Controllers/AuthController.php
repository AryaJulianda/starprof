<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');
        $user = User::where('username', $credentials['username'])->first();

        if ($user) {
            if (Auth::attempt($credentials)) {
                return response()->json(['message' => 'Login successful'], 200);
            } else {
                return response()->json(['message' => 'Incorrect password'], 401);
            }
        } else {
            return response()->json(['message' => 'Username not registered'], 404);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (session()->has('admin')) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = DB::table('users')
            ->where('username', $request->username)
            ->first();

        if ($user && $request->password === $user->password) {
            session(['admin' => (array) $user]);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Username atau Password salah!')->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        session()->forget('admin');
        return redirect()->route('admin.login');
    }
}

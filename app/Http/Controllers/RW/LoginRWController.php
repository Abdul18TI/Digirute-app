<?php

namespace App\Http\Controllers\RW;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRWController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        // dd($request->routeIs('rt.*'));
        $validate = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // dd(Hash::make('asdasd'));
        // dd('berhasil login');
        $credentials = $request->only('username', 'password');
        if (Auth::guard('rw')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('rw.dashboard.home');
        }

        return back()->with([
            'gagal' => 'Terjadi kesalahan pada login, email atau password salah',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::guard('rw')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/RW');
    }
}

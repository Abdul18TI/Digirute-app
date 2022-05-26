<?php

namespace App\Http\Controllers\RT;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginRTController extends Controller
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
        if (Auth::guard('rt')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('rt.home');
        }

        return back()->with([
            'gagal' => 'Terjadi kesalahan pada login, email atau password salah',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::guard('rt')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/RT');
    }
}

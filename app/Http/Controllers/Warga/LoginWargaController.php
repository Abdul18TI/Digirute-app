<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginWargaController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $credentials['active'] = 1;
        // dd(Hash::make('asdasd'));
        // dd('berhasil login');

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('warga.home');
        } else {
            if ($credentials['active'] == 1) {
                return back()->with([
                    'gagal' => 'Terjadi kesalahan pada login, akun anda sudah di non aktifkan',
                ]);
            }
            return back()->with([
                'gagal' => 'Terjadi kesalahan pada login, email atau password salah',
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

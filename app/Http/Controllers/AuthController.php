<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerSimpan(Request $request)
    {
        Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'password' => 'required|confirmed'

        ])->validate();

        User::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level' => 'fungsional'
        ]);

        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAksi(Request $request)
{
    $request->validate([
        'nip_nim_nidn' => 'required',
        'password' => 'required',
    ]);

    // Mencoba melakukan otentikasi sebagai admin
    if (Auth::guard('admin')->attempt(['nip' => $request->nip_nim_nidn, 'password' => $request->password])) {
        info('Admin authenticated successfully.');
        return redirect()->intended(route('admin.dashboard'));
    }

    // Mencoba melakukan otentikasi sebagai dosen
    if (Auth::guard('dosen')->attempt(['nidn' => $request->nip_nim_nidn, 'password' => $request->password])) {
        info('Dosen authenticated successfully.');
        return redirect()->intended(route('dosen.dashboard'));
    }

    // Mencoba melakukan otentikasi sebagai mahasiswa
    if (Auth::guard('mahasiswa')->attempt(['nim' => $request->nip_nim_nidn, 'password' => $request->password])) {
        info('Mahasiswa authenticated successfully.');
        return redirect()->intended(route('mahasiswa.dashboard'));
    }

    throw ValidationException::withMessages([
        'nip_nim_nidn' => ['NIP, NIM, atau NIDN yang Anda masukkan salah.'],
    ]);
}


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}

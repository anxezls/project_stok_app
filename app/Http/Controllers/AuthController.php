<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use function Ramsey\Uuid\v1;

class AuthController extends Controller
{

    public function index()
    {
        return view('Auth.login');
    }

    

    public function login(request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ], [
            //ini bahasa indonesia
            'email.required' => 'Form Wajib Di isi!',
            'email.email' => 'Silahkan isi dengan format @gmail.com',
            'email.exists' => 'Maaf email belum terdaftar',

            'password.required' => 'password wajib di isi',
            'password.min' => 'password minimal 6 karakter'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($infologin)) {
            return redirect('/dashboard');
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Email tidak sesuai',
                'password' => 'Password tidak sesuai'
            ]);
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
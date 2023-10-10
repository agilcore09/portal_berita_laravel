<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RegisterMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostMail;
use Notification;

class UserController extends Controller
{

    public function loginView()
    {
        return view('dashboard.login');
    }

    public function registerView(Request $request, User $user)
    {
        return view('dashboard.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name_lengkap' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required'
        ]);

        $users = new User;
        $users->name_lengkap = $request->name_lengkap;
        $users->email = $request->email;
        $users->username = $request->username;
        $users->password = bcrypt($request->password);
        $users->save();

        Mail::to($request->email)->send(new PostMail());
        // sample 
        Alert::success('Sukses', 'Berhasil Register');
        return redirect()->back();
    }

    public function login(Request $request,)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('login');
        }

        return back()->withErrors([
            'username' => 'Email Tidak Terdaftar',
            'password' => 'Password Tidak Terdaftar'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}

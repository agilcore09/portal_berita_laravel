<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

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

        Alert::success('Sukses', 'Berhasil Register');
        return redirect()->back();
    }

    public function login(Request $request,)
    {
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('portal');
        } else {
            Alert::error('Warning', 'Kamu belum Login');
            return redirect()->to('login');
        }
    }
}

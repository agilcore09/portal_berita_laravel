<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PortalUserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $data = BeritaModel::all();
            return view('portal', compact("data"));
        } else {
            Alert::error('Warning', 'Kamu belum Login');
            return redirect()->to('login');
        }
    }
}

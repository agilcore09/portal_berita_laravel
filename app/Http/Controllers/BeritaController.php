<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
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

    public function showBerita()
    {
        $data = BeritaModel::all();
        return view('berita.index', compact('data'));
    }

    public function tambahBerita()
    {
        return view('berita.tambah');
    }
}

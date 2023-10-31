<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortalUserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            $data = DB::table('berita')
                ->join('kategori', 'kategori.id', 'berita.kategori_id')
                ->paginate(3);

            return view('portal', compact("data"));
        } else {
            Alert::error('Warning', 'Kamu belum Login');
            return redirect()->to('login');
        }
    }
}

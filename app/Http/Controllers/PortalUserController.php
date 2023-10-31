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

            // for display in 3 paginate
            $data = DB::table('berita')
                ->join('kategori', 'kategori.id', 'berita.kategori_id')
                ->paginate(3);

            // get category
            $category = DB::table('kategori')->get();

            // get popular post
            $popularPost = DB::table('berita')->limit(4)->get();

            //berita terkini
            $beritaTerkini = DB::table('berita')->limit(3)->get();

            return view('portal', compact("data", "category", "popularPost", "beritaTerkini"));
        } else {
            Alert::error('Warning', 'Kamu belum Login');
            return redirect()->to('login');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortalUserController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {

            if ($request->cari_berita != null) {

                $data = DB::table('berita')
                    ->join('kategori', 'kategori.id', 'berita.kategori_id')
                    ->where('judul_berita', 'like', '%' . $request->cari_berita . '%')
                    ->first();

                // get category
                $category = DB::table('kategori')->get();

                // get popular post
                $popularPost = DB::table('berita')->limit(4)->get();

                //berita terkini
                $beritaTerkini = DB::table('berita')->limit(3)->get();
            } else {
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
            }

            return view('portal', compact("data", "category", "popularPost", "beritaTerkini"));
        } else {
            Alert::error('Warning', 'Kamu belum Login');
            return redirect()->to('login');
        }
    }

    public function bacaBerita($slug)
    {
        // catch data to detail;
        $data = DB::table('berita')->where('slug', '=', $slug)->first();

        // get category
        $category = DB::table('kategori')->get();

        // get popular post
        $popularPost = DB::table('berita')->limit(4)->get();

        //berita terkini
        $beritaTerkini = DB::table('berita')->limit(3)->get();
        return view('baca', compact("data", "category", "popularPost", "beritaTerkini"));
    }

    public function showByCategory($category)
    {
        $data = DB::table('berita')
            ->join('kategori', 'berita.kategori_id', 'kategori.id')
            ->where('kategori.nama_kategori', '=', $category)
            ->paginate(2);

        // get category
        $category = DB::table('kategori')->get();

        // get popular post
        $popularPost = DB::table('berita')->limit(4)->get();

        //berita terkini
        $beritaTerkini = DB::table('berita')->limit(3)->get();

        return view('category', compact("data", "category", "popularPost", "beritaTerkini"));
    }
}

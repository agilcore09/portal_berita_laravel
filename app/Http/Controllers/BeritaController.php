<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

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

    public function storeBerita(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'judul_berita' => 'required',
            'body_berita' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        $berita = new BeritaModel();
        $berita->judul_berita = $request->judul_berita;
        $berita->body_berita = $request->body_berita;
        $berita->slug = $request->slug;
        $berita->save();

        return response()->json([
            "success" => true,
            'message' => 'Data Berhasil Di Simpan',
        ]);
    }
}

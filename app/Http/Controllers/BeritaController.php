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
        $data = BeritaModel::paginate(3);
        return view('berita.index', compact('data'));
    }

    public function tambahBerita()
    {
        return view('berita.tambah');
    }

    public function storeBerita(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            'judul_berita' => 'required',
            'body_berita' => 'required'
        ]);


        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        $gambar = $request->file('gambar');
        $nama_file = time() . "_" . $gambar->getClientOriginalName();
        $tujuan = 'data_blog';
        $gambar->move($tujuan, $nama_file);

        $berita = new BeritaModel();
        $berita->judul_berita = $request->judul_berita;
        $berita->body_berita = $request->body_berita;
        $berita->slug = str_replace(' ', '-', $request->judul_berita);
        $berita->gambar = $nama_file;
        $berita->save();

        Alert::success('Sukses', 'Berhasil Menambah Berita');
        return redirect()->to('/dashboard');
    }

    public function showDetail($slug)
    {
        return view('berita.detail');
    }
}

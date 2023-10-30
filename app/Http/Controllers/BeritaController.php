<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function showBerita(Request $request)
    {
        if ($request->cari_judul != null) {
            $cariBerita = BeritaModel::where('judul_berita', 'like', '%' . $request->cari_judul . '%')->first();
            $data = $cariBerita;
            return view('berita.index', compact('data'));
        }
        $data = BeritaModel::orderBy('created_at', 'ASC')->paginate(6);
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
        $berita->created_at = Carbon::now();
        $berita->save();

        Alert::success('Sukses', 'Berhasil Menambah Berita');
        return redirect()->to('/dashboard');
    }

    public function showDetail($slug)
    {
        $data = DB::table('berita')->where('slug', '=', $slug)->first();
        return view('berita.detail', compact('data'));
    }

    public function updateShowBerita($slug)
    {
        $data = DB::table('berita')->where('slug', '=', $slug)->first();
        return view('berita.update', compact('data'));
    }

    public function updateBerita(Request $request, $slug)
    {
        $data = DB::table('berita')->where('slug', '=', $slug);
        $images = DB::table('berita')->where('slug', '=', $slug)->first();
        if ($request->gambar == null) {
            $data->update([
                'judul_berita' => $request->judul_berita,
                'slug' => str_replace(' ', '-', $request->judul_berita),
                'body_berita' => $request->body_berita
            ]);
            Alert::success('Sukses', 'Berhasil Mengubah Berita');
            return redirect()->to('/dashboard');
        } else {
            //hapus old image
            Storage::disk('local')->delete('public/data_blog/' . $images->gambar);
            $gambar = $request->file('gambar');
            $nama_file = time() . "_" . $gambar->getClientOriginalName();
            $tujuan = 'data_blog';
            $gambar->move($tujuan, $nama_file);

            $data->update([
                'judul_berita' => $request->judul_berita,
                'slug' => str_replace(' ', '-', $request->judul_berita),
                'body_berita' => $request->body_berita,
                'gambar' => $nama_file
            ]);

            Alert::success('Sukses', 'Berhasil Mengubah Berita');
            return redirect()->to('/dashboard');
        }
    }

    public function deleteBerita($slug)
    {
        DB::table('berita')->where('slug', '=', $slug)->delete();
        Alert::success('Sukses', 'Berhasil Menghapus Berita');
        return redirect()->back();
    }
}

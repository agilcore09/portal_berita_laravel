@extends('admin.main')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="header mt-3">
                <h3>Tambah Berita</h3>
            </div>
            <div class="col-md-12">
                <div class="body">
                    <div class="card p-3">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-12">
                                    <form method="POST" id="proses" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Ubah Judul Berita</label>
                                            <input type="text" class="form-control w-100" id="judul"
                                                name="judul_berita" placeholder="Masukkan judul berita" autocomplete="off"
                                                value="{{ $data->judul_berita }}">

                                        </div>
                                        <div class="form-group">
                                            <div style="width: 200px;">
                                                <img src="{{ asset('data_blog/' . $data->gambar) }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Ubah Gambar</label>
                                            <input type="file" class="form-control-file" id="gambar" name="gambar"
                                                value="download.jpg">

                                        </div>
                                        <div class="form-group">
                                            <label for="berita">Ubah Isi Berita</label>
                                            <textarea class="form-control" id="berita" rows="5" placeholder="Masukkan berita" name="body_berita"
                                                autocomplete="off">{{ $data->body_berita }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-plus"></i>
                                            Ubah Berita</button>
                                        <a href="{{ url('/') }}/dashboard" class="btn btn-danger"> <i
                                                class="fa-solid fa-arrow-left"></i> Kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

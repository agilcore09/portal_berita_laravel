@extends('admin.main')
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
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="judul">Judul Berita</label>
                                            <input type="text" class="form-control w-100" id="judul"
                                                name="judul_berita" placeholder="Masukkan judul berita">

                                        </div>
                                        <div class="form-group">
                                            <label for="gambar" id="gambar">Gambar</label>
                                            <input type="file" class="form-control-file" id="gambar">
                                        </div>
                                        <div class="form-group">
                                            <label for="berita">Isi Berita</label>
                                            <textarea class="form-control" id="berita" rows="5" placeholder="Masukkan berita" name="body_berita"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah Berita</button>
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

@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="header my-3 container">
                <h3>{{ $data->judul_berita }}</h3>
                <small class="date-parse"> {{ $data->created_at }}</small>
            </div>
            <div class="col-md-12">
                <div class="body">
                    <div class="card p-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="container-fluid mt-3">
                                        <img src="{{ asset('/data_blog') }}/{{ $data->gambar }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="container-fluid mt-3">
                                        <p>{{ $data->body_berita }}</p>
                                    </div>
                                    <div class="container-fluid">
                                        <a href="{{ url('/') }}/dashboard" class="btn btn-danger"> <i
                                                class="fa-solid fa-arrow-left"></i> Kembali</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="header mt-3">
                <h3>Berita kamu</h3>
            </div>
            <div class="col-md-12">
                <div class="body">
                    <div class="card p-3">
                        <div class="container">
                            <div class="row">

                                @foreach ($data as $item)
                                    <div class="col-md-4 mt-3">
                                        <div class="card" style="width: 18rem; height: 28rem; ">
                                            <div class="img-container">
                                                <img src="{{ asset('data_blog/' . $item->gambar) }}" class="card-img-custom"
                                                    alt="{{ $item->gambar }}">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title cut-head">{{ $item->judul_berita }}</h5>
                                                <p class="card-text cut-off">{{ $item->body_berita }}</p>
                                                <small class="date-parse"> {{ $item->created_at }}</small>
                                            </div>
                                            <div class="pb-2">
                                                <ul class="pl-4">
                                                    <a href="{{ url('/dashboard') }}/{{ $item->slug }}"><i
                                                            class="fa-solid fa-eye text-success"></i></a>
                                                    <a href="{{ url('/delete') }}/{{ $item->slug }}"><i
                                                            class="fa-solid fa-trash text-danger"></i></a>
                                                    <a href="{{ url('/') }}/update-berita/{{ $item->slug }}"><i
                                                            class="fa-solid fa-pen-to-square text-warning"></i></a>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-12 mt-3">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

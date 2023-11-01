@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="container py-3">
                    <h3>Daftar Subscribe </h3>
                </div>
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tanggal Berlangganan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <?php $num = 1; ?>
                                @foreach ($datas as $item)
                                    <th scope="row">{{ $num++ }}</th>
                                    <td>{{ $item->name_lengkap }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->tanggal_langganan }}</td>
                                @endforeach
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

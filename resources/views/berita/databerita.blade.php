@extends('layout.side')

@section('content')

        <h1 class="mt-3">DATA BERITA</h1>
        <div class="container">
            <div class="col-6">    
                <a href="/beritacreate" class="btn btn-primary my-3">Tambah Berita</a>
            </div>
        {{-- //status --}}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <div class="table-responsive-sm">
                            <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Berita</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($posts  as $p)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{$p->judul}}</td>
                                    <td>{{$p->berita}}</td>
                                    <td><img width="80px" src="{{ url('/data_file/'.$p->file) }}"></td>
                                    <td>
                                        <a href="#" class="badge badge-danger">Hapus</a>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                        {{-- <a href="/family/cetak_pdf" class="btn btn-primary my-8"  target="_blank">Cetak</a> --}}

@endsection
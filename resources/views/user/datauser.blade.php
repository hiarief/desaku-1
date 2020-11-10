@extends('layout.side')

@section('content')

        <h1 class="mt-3">DATA USER</h1>
        <div class="container">
            <div class="col-6">    
                <a href="/beritacreate" class="btn btn-primary my-3">Tambah User</a>
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
                                    <th scope="col">Nik</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Hak Akses</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($user  as $us)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{$us->nik}}</td>
                                    <td>{{$us->name}}</td>
                                    <td>{{$us->email}}</td>
                                    <td>
                                        @foreach($us->akses as $t)
                                        {{$t->keterangan}}
                                          @endforeach
                                    </td>
                                    <td><a href="/suratmenikahcetak/{{ $us->id }}" class="badge badge-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                        {{-- <a href="/family/cetak_pdf" class="btn btn-primary my-8"  target="_blank">Cetak</a> --}}

@endsection
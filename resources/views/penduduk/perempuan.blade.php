@extends('layout.side')

@section('content')

        <h1 class="mt-3">JENIS KELAMIN</h1>
        <div class="container">
        <div class="row">
            {{-- <div class="col-md-8">    
                <a href="/family/create" class="btn btn-primary my-3">Tambah Data</a>
            </div> --}}
            <div class="col-md-4">   
                <form action="/perempuan/cari" method="GET">
                    {{-- <label>Cari:</label>
                    <input type="text" name="cari" placeholder="Jenis Kelamin" value="{{ old('cari') }}">
                    <input value="cari" type="submit"> --}}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"  name="cari" placeholder="Jenis Kelamin" aria-label="Jenis Kelamin" value="{{ old('cari') }}" aria-describedby="button-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="submit"  value="cari" id="button-addon2">Cari</button>
                        </div>
                      </div>
                </form>
            </div>
        </div>
        </div>
        {{-- //status --}}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table  table-hover table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tgl Lahir</th>
                                <th scope="col">S Perkawinan</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">RT</th>
                                <th scope="col">RW</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($familycards  as $fm)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$fm->nik}}</td>
                                <td>{{$fm->nama}}</td>
                                <td>{{$fm->tempat_lahir}}</td>
                                <td>{{$fm->tgl_lahir}}</td>
                                <td>{{$fm->status_perkawinan}}</td>
                                <td>{{$fm->jenis_kelamin}}</td>
                                <td>{{$fm->alamat}}</td>
                                <td>{{$fm->rt}}</td>
                                <td>{{$fm->rw}}</td>
                                <td>
                                    <a href="#" class="badge badge-success">Show</a>
                                    <a href="#" class="badge badge-danger">Hapus</a>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <br>
                            Halaman : {{ $familycards ->currentPage() }} <br/>
                            Jumlah Data : {{ $familycards ->total() }} <br/>
                            Data Per Halaman : {{ $familycards->perPage() }} <br/>
                        
                        
                            {{ $familycards ->links() }}
                        
@endsection
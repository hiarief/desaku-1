@extends('layout.side')

@section('content')

        <h1 class="mt-3">KEPALA KELUARGA</h1>
        <div class="container">
        <div class="row">
            <div class="col-6">    
                <a href="/familycreate" class="btn btn-primary my-3">Tambah Data</a>
            </div>
            <div class="col-6">   
                {{-- <form action="/family/cari" method="GET">
                    <label>Cari:</label>
                    <input type="text" name="cari" placeholder="cari kk" value="{{ old('cari') }}">
                    <input value="cari" type="submit">
                </form> --}}
                    <form action="/familycari" method="GET">
                        {{-- <label>Cari:</label>
                        <input type="text" name="cari" placeholder="Jenis Kelamin" value="{{ old('cari') }}">
                        <input value="cari" type="submit"> --}}
                        <div class="input-group mb-6">
                            <input type="text" class="form-control"  name="cari" placeholder="No KK" aria-label="Jenis Kelamin" value="{{ old('cari') }}" aria-describedby="button-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"  value="cari" id="button-addon2">Cari</button>
                            </div>
                        </div>
                    </form>
            </div>
            </div>
        {{-- //status --}}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-sm table-responsive-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">KK</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tempat Lahir</th>
                                    <th scope="col">Tgl Lahir</th>
                                    <th scope="col">S Perkawinan</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Pekerjaan</th>
                                    <th scope="col">RT</th>
                                    <th scope="col">RW</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($familycards  as $fm)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{$fm->kk}}</td>
                                    <td>{{$fm->nik}}</td>
                                    <td>{{$fm->nama}}</td>
                                    <td>{{$fm->tempat_lahir}}</td>
                                    <td>{{$fm->tgl_lahir}}</td>
                                    <td>{{$fm->status_perkawinan}}</td>
                                    <td>{{$fm->jenis_kelamin}}</td>
                                    <td>{{$fm->alamat}}</td>
                                    <td>{{$fm->pekerjaan}}</td>
                                    <td>{{$fm->rt}}</td>
                                    <td>{{$fm->rw}}</td>
                                    <td>
                                        <a href="/family/familyedit/{{ $fm->id }}" class="badge badge-success">Edit</a>
                                        <a href="/family/hapus/{{ $fm->id }}" class="badge badge-danger">Hapus</a>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                        <br>
                            Halaman : {{ $familycards ->currentPage() }} <br/>
                            Jumlah Data : {{ $familycards ->total() }} <br/>
                            Data Per Halaman : {{ $familycards->perPage() }} <br/>
                        
                        
                            {{ $familycards ->links() }}
                            <br>
                            <a href="/family/cetak_pdf" class="btn btn-primary my-8"  target="_blank">Cetak</a>

@endsection
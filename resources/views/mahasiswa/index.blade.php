@extends('layout.side')

@section('mahasiswa')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h1 class="mt-3">DAFTAR MAHASISWA</h1>
        </div>
        <table class="table table-sm table-responsive-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Semester</th>
                <th scope="col">Prodi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($student as $stud)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$stud->nim}}</td>
                <td>{{$stud->nama}}</td>
                <td>{{$stud->semester}}</td>
                <td>{{$stud->nama_prodi}}</td>
                <td>
                <a href="" class="badge badge-success">Edit</a>
                <a href="" class="badge badge-danger">Hapus</a>
            </td>
            </tr>
        @endforeach
        </tbody>
        </table>
        <br>
            Halaman : {{ $student->currentPage() }} <br/>
            Jumlah Data : {{ $student->total() }} <br/>
            Data Per Halaman : {{ $student->perPage() }} <br/>
         
         
            {{ $mahasiswa->links() }}
    </div>
</div>
@endsection
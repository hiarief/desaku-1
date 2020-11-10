<html>
<head>
	<title>LAPORAN KEPALA KELUARGA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>KARTU KELUARGA</h4>
		</center>
                    
             
                        <table class="table table-sm table-responsive-sm" border="1">
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
                                    <th scope="col">RT</th>
                                    <th scope="col">RW</th>
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
                                        <td>{{$fm->rt}}</td>
                                        <td>{{$fm->rw}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
             
            </body>
            </html>
                            {{-- Halaman : {{ $familycards ->currentPage() }} <br/>
                            Jumlah Data : {{ $familycards ->total() }} <br/>
                            Data Per Halaman : {{ $familycards->perPage() }} <br/>
                        
                        
                            {{ $familycards ->links() }} --}}
                            {{-- <br>
                            <a href="/family/cetak_pdf" class="btn btn-primary my-8">Cetak</a> --}}

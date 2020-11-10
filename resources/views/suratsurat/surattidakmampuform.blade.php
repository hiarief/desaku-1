@extends('layout.side')

@section('createfam')

<div class="container-fluid">
            <h1 class="mt-4">Surat</h1>
            <ol class="breadcrumb mb-8">
                <li class="breadcrumb-item ative">Keterangan Tidak Mampu</li>
            </ol>
                        {{-- //status --}}
                          @if (session('status'))
                          <div class="alert alert-success">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                          </div>
                        @endif
                        <div class="row" >
                          <div class="col-12">
                              <form method="POST" action="/sktmampusimpan">
                                  @csrf
                                    <div class="form-group">
                                      <label for="Nomor" class="mt-8">NOMOR</label>
                                      <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor"  name="nomor" value="{{$sktms}}" readonly>
                                          @error('nomor')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control  @error('nik') is-invalid @enderror Dsnik" id="nik" placeholder="Masukan NIK" name="nik" value="{{ old('nik') }}"
                                        data-toggle="modal" data-target="#exampleModal">
                                        @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror							
                                    </div>
                                    <div class="form-group">
                                      <label for="nama">Nama</label>
                                      <input type="text" class="form-control  @error('nama') is-invalid @enderror Dsnama" id="nama" placeholder="Nama" name="nama" value="{{ old('nama') }}">
                                      @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control  @error('jenis') is-invalid @enderror" id="jenis"  name="jenis" value="SKTM">
                                        @error('jenis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                      <button type="submit" class="btn btn-secondary btn-lg btn-block">Simpan</button>
                              </form>
                          </div> 
                        </div>
                        <div class="row" >
                          <div class="col-12">
                              <div class="table-responsive">
                                  <table class="table">
                                  <thead>
                                      <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">NIK</th>
                                          <th scope="col">Nama</th>
                  
                                          <th scope="col">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($familycards  as $f)
                                      <tr>
                                         <th scope="row">{{ $loop->iteration }}</th>
                                           
                                          {{-- <td>{{$f->id}}</td> --}}
                                          <td>{{$f->nik}}</td>
                                          <td>{{ $f->nama }}</td>
                                          <td>
                                              <a href="/suratmenikahcetak/{{ $f->id }}" class="btn btn-secondary btn-sm" target="_blank">Print</a>
                                          </td>
                                      </tr>
                                  @endforeach
                                  </tbody>
                                  </table>
                              </div>
                          </div>         
                      </div>
        </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">DATA PENDUDUK</h5>
              <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" placeholder="Cari NIK" name="nik" >
            @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror							
    
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table-responsive table-sm">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="nik">NIK</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">RT</th>
                    <th scope="col">RW</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($familycard  as $fm)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><button class="btnnik" data-id="{{$fm->nik}}" data-nama="{{$fm->nama}}"  data-dismiss="modal">{{$fm->nik}}</button><td>
                        <td>{{$fm->nama}}</td>
                        <td>{{$fm->alamat}}</td>
                        <td>{{$fm->tempat_lahir}}</td>
                        <td>{{$fm->rt}}</td>
                        <td>{{$fm->rw}}</td>
                        <td>
                            {{-- <a href="/familyedit/{{ $fm->id }}" class="badge badge-success">Edit</a>
                            <a href="/family/hapus/{{ $fm->id }}" class="badge badge-danger">Hapus</a> --}}
                    </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
 
        <div class="modal-footer">
          {{ $familycards ->links() }}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

@endsection
@section('footer')
{{-- <body>
	<h1>Get Function JQuery | www.malasngoding.com</h1>	
	<input type="text" name="nama" class="nama">
	<button id="tombol">KLIK</button>	
</body> --}}

<script type="text/javascript">
	$(document).ready(function(){
		$('.btnnik').click(function(){
			var $nik = $(this).data("id");
      var $nama = $(this).data("nama");
      console.log($(this).data("id"))
      $('.Dsnik').val($nik)
      $('.Dsnama').val($nama)
		});		
	});
</script>
@endsection


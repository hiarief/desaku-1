@extends('layout.side')

@section('createfam')

        <div class="container-fluid">
            <h3 class="mt-4">DATA PELAMAR KERJA</h3>
            <ol class="breadcrumb mb-8">
                <li class="breadcrumb-item ative">Identitas Umum Sesuai KTP</li>
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
                            
                            <form method="POST" action="#">
                                @csrf
                                <div class="form-group">
                                <input type="hidden" class="form-control @error('nomor') is-invalid @enderror" id="nomor"  name="nomor" value="">
                                    @error('nomor')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control  @error('nama') is-invalid @enderror Dsnama" id="nama" placeholder="Nama" name="nama" value="{{ old('nama') }}"
                                    data-toggle="modal" data-target="#exampleModal">
                                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tempat / Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control  @error('nama') is-invalid @enderror Dtempat_lahir" id="nama" placeholder="Tempat Lahir" name="tempat_lahir" value="{{ old('nama') }}" readonly>
                                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control  @error('nama') is-invalid @enderror Dtgl_lahir" id="nama" placeholder="Tanggal lahir" name="tgl_lahir" value="{{ old('nama') }}" readonly>
                                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat</label>
                                    <textarea type="text" class="form-control  @error('nama') is-invalid @enderror Dalamat" id="nama" placeholder="Alamat" name="nama" value="{{ old('nama') }}" readonly>
                                    </textarea>
                                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jenis Kelamin</label>
                                    <input type="text" class="form-control  @error('jenis_kelamin') is-invalid @enderror Djenis_kelamin" id="nama" placeholder="Jenis Kelamin" name="nama" value="{{ old('nama') }}" readonly>
                                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">RT RW</label>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control  @error('nama') is-invalid @enderror Drt" id="nama" placeholder="RT" name="nama" value="{{ old('nama') }}" readonly>
                                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control  @error('nama') is-invalid @enderror Drw" id="nama" placeholder="RW" name="nama" value="{{ old('nama') }}" readonly>
                                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nik">Asal Sekolah</label>
                                    <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" placeholder="Asal Sekolah" name="lulusan" value="{{ old('nik') }}">
                                    @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror							
                                </div>
                                <div class="form-group">
                                    <label for="nik">Jurusan</label>
                                    <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" placeholder="Jurusan" name="jurusan" value="{{ old('nik') }}">
                                    @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror							
                                </div>
                                <div class="form-group">
                                    <label for="nik">Jurusan</label>
                                    <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" placeholder="Jurusan" name="jurusan" value="{{ old('nik') }}">
                                    @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror							
                                </div>
                                <div class="form-group">
                                    <label for="nik">Tahun lulus</label>
                                    <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" placeholder="Tahun Lulus" name="tahunlulus" value="{{ old('nik') }}">
                                    @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror							
                                </div>
                                <div class="form-group">
                                    <label for="nik">Pengalaman Pekerjaam</label>
                                    <textarea type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" placeholder="Pengalaman Pekerjaan" name="tahunlulus" value="{{ old('nik') }}"
                                    ></textarea>
                                    @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror							
                                </div>
                                <div class="form-group">
                                    <label for="nik">No HP</label>
                                    <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" placeholder="Masukan No Hp Aktif" name="nik" value="{{ old('nik') }}"
                                >
                                    @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror							
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" placeholder="Masukan NIK" name="nik" value="{{ old('nik') }}" readonly>
                                    @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror							
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control  @error('jenis') is-invalid @enderror" id="jenis"  name="jenis" value="SKBM">
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
                            
                                    <tr>
                                        <th scope="row"></th>
                                        
                                        {{-- <td>{{$f->id}}</td> --}}
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="#" class="btn btn-secondary btn-sm" target="_blank">Print</a>
                                        </td>
                                    </tr>
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
                    <th scope="col">JENIS KELAMIN</th>
                    <th scope="col">TEMPAT LAHIR</th>
                    <th scope="col">TANGGAL LAHIR</th>
                    <th scope="col">RT</th>
                    <th scope="col">RW</th>

                </tr>
                </thead>
                <tbody>
                  @foreach($familycard  as $fm)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><button class="btnnik" data-id="{{$fm->nik}}" data-nama="{{$fm->nama}}" data-jenis_kelamin="{{$fm->jenis_kelamin}}" data-tempat_lahir="{{$fm->tempat_lahir}}" data-tgl_lahir="{{$fm->tgl_lahir}}" data-rt="{{$fm->rt}}" data-rw="{{$fm->rw}}"  data-dismiss="modal">{{$fm->nik}}</button><td>
                        <td>{{$fm->nama}}</td>
                        <td>{{$fm->alamat}}</td>
                        <td>{{$fm->jenis_kelamin}}</td>
                        <td>{{$fm->tempat_lahir}}</td>
                        <td>{{$fm->tgl_lahir}}</td>
                        <td>{{$fm->rt}}</td>
                        <td>{{$fm->rw}}</td>
                        <td>
                            {{-- {{-- <a href="/familyedit/{{ $fm->id }}" class="badge badge-success">Edit</a>
                            <a href="/family/hapus/{{ $fm->id }}" class="badge badge-danger">Hapus</a> --}}
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="modal-footer">
          {{ $familycard ->links() }}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
         </div> 
      </div>
    </div>
  </div>

@endsection
@section('footer')
<script type="text/javascript">
	$(document).ready(function(){
		$('.btnnik').click(function(){
			var $nik = $(this).data("id");
            var $nama = $(this).data("nama");
            var $alamat = $(this).data("alamat");
            var $jenis_kelamin = $(this).data("jenis_kelamin");
            var $tempat_lahir = $(this).data("tempat_lahir");
            var $tgl_lahir = $(this).data("tgl_lahir");
            var $rt = $(this).data("rt");
            var $rw = $(this).data("rw");
      console.log($(this).data("id"))
      $('.Dsnik').val($nik)
      $('.Dsnama').val($nama)
      $('.Dalamat').val($alamat)
      $('.Djenis_kelamin').val($jenis_kelamin)
      $('.Dtempat_lahir').val($tempat_lahir)
      $('.Dtgl_lahir').val($tgl_lahir)
      $('.Drt').val($rt)
      $('.Drw').val($rw)
		});		
	});
</script>
@endsection


@extends('layout.nav')

@section('createdata')
<div class="container-fluid">
    <h4 style="margin-top:60px">Desa Sumurbandung</h4>
    <ol class="breadcrumb mb-8">
         <li class="breadcrumb-item ative">Selamat Datang {{ Auth::user()->name }}</li>
    </ol>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">SKBM</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">SKTM</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">SKB</a>
          <a class="nav-item nav-link" id="nav-bd" data-toggle="tab" href="#nav-bd" role="tab" aria-controls="nav-bd" aria-selected="false">SKBD</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="container-fluid">
                        <h4 style="margin-top:20px">SURAT KETERANGAN BELUM MENIKAH</h4>
                        <div class="row" >
                            <div class="col-7">
                                
                                <form method="POST" action="/suratmenikahsimpan">
                                    @csrf
                                    <div class="form-group">
                                    <label for="Nomor" class="mt-8">NOMOR</label>
                                    <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor"  name="nomor" value="{{$surats}}">
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
                                        <input type="hidden" class="form-control  @error('jenis') is-invalid @enderror" id="jenis"  name="jenis" value="SKBM">
                                        @error('jenis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                        <button type="submit" class="btn btn-secondary btn-lg btn-block">Simpan</button>
                                </form>
                            </div> 
                            <div class="col-5">
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
                                    @foreach($darafamily  as $fm)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$fm->nik}}</td>
                                            <td>{{$fm->nama}}</td>
                                            <td>
                                                <a href="/suratmenikahcetak/{{ $fm->id }}" class="badge badge-success" target="_blank">Print</a>
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
                                            @foreach($familycards  as $fm)
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

                           
                            {{-- <body>
                                <h1>Get Function JQuery | www.malasngoding.com</h1>	
                                <input type="text" name="nama" class="nama">
                                <button id="tombol">KLIK</button>	
                            </body> --}}


        </div>

{{-- SKB --}}

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="container-fluid">
                        <h4 style="margin-top:20px">SURAT KETERANGAN KELAKUAN BAIK</h4>
                        <div class="row" >
                            <div class="col-7">
                                
                                <form method="POST" action="/suratmenikahsimpan">
                                    @csrf
                                    <div class="form-group">
                                    <label for="Nomor" class="mt-8">NOMOR</label>
                                    <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor"  name="nomor" value="{{$surats}}">
                                        @error('nomor')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control  @error('nik') is-invalid @enderror Dsnika" id="nik" placeholder="Masukan NIK" name="nik" value="{{ old('nik') }}"
                                        data-toggle="modal" data-target="#exampleModalskb">
                                        @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror							
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control  @error('nama') is-invalid @enderror Dsnamaa" id="nama" placeholder="Nama" name="nama" value="{{ old('nama') }}">
                                        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                        <button type="submit" class="btn btn-secondary btn-lg btn-block">Simpan</button>
                                </form>
                            </div> 
                            <div class="col-5">
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
                                    @foreach($darafamily  as $fm)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$fm->nik}}</td>
                                            <td>{{$fm->nama}}</td>
                                            <td>
                                                <a href="/suratmenikahcetak/{{ $fm->id }}" class="badge badge-success" target="_blank">Print</a>
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
                            <div class="modal fade" id="exampleModalskb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            @foreach($familycards  as $fm)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td><button class="btnnika" data-id="{{$fm->nik}}" data-nama="{{$fm->nama}}"  data-dismiss="modal">{{$fm->nik}}</button><td>
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

                           
                            {{-- <body>
                                <h1>Get Function JQuery | www.malasngoding.com</h1>	
                                <input type="text" name="nama" class="nama">
                                <button id="tombol">KLIK</button>	
                            </body> --}}
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
        <div class="tab-pane fade" id="nav-bd" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
      </div>
</div>

@endsection


@section('footer')
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
<script type="text/javascript">
    $(document).ready(function(){
        $('.btnnika').click(function(){
            var $nik = $(this).data("id");
    var $nama = $(this).data("nama");
    console.log($(this).data("id"))
    $('.Dsnika').val($nik)
    $('.Dsnamaa').val($nama)
        });		
    });
</script>
@endsection

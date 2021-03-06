@extends('layout.side')


@section('createfam')

        <div class="container">
            <label for="inputdata">EDIT DATA KK</label>
            <div class="row">
                <div class="col-7">
                    
                <form method="POST" action="/familyupdate/{{ $familycards->id }}">
                    
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                        <div class="form-group">
                          <label for="KK">KK</label>
                        <input type="text" class="form-control @error('kk') is-invalid @enderror" id="kk" name="kk" value="{{$familycards->kk}}">
                            @error('kk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" placeholder="Masukan NIK" name="nik" value="{{ $familycards->nik }}">
                            @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama" name="nama" value="{{ $familycards->nama }}">
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Masukan Tmp Lahir" name="tempat_lahir" value="{{ $familycards->tempat_lahir }}">
                            @error('tempat_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control  @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="Masukan Tgl Lahir" name="tgl_lahir" value="{{ $familycards->tgl_lahir }}">
                            @error('tgl_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="status_perkawinan">Status Perkawinan</label>
                            {{-- <input type="text" class="form-control  @error('status_perkawinan') is-invalid @enderror" id="status_perkawinan" placeholder="Masukan Status Perkawinan" name="status_perkawinan" value="{{ old('status_perkawinan') }}">
                            @error('status_perkawinan')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
                            <select id="status_perkawinan" class="form-control  @error('status_perkawinan') is-invalid @enderror" placeholder="Masukan Status Perkawinan" name="status_perkawinan" value="{{ $familycards->status_perkawinan }}">
                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                <option value="KAWIN">KAWIN</option>
                              </select>
                            @error('status_perkawinan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            {{-- <input type="text" class="form-control  @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" placeholder="Masukan Jenis Kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                            @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
                            <select id="jenis_kelamin" class="form-control  @error('jenis_kelamin') is-invalid @enderror" placeholder="Masukan jenis kelamin" name="jenis_kelamin" value="{{ $familycards->jenis_kelamin }}">
                                <option value="LAKI LAKI">LAKI LAKI</option>
                                <option value="PEREMPUAN">PEREMPUAN</option>
                              </select>
                            @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukan Jenis Kelamin" name="alamat" value="{{ $familycards->alamat }}">
                            @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control  @error('pekerjaan') is-invalid @enderror" id="pekerjaan" placeholder="Masukan pekerjaan" name="pekerjaan" value="{{ $familycards->pekerjaan }}">
                            @error('pekerjaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="text" class="form-control  @error('rt') is-invalid @enderror" id="rt" placeholder="Masukan RT" name="rt" value="{{ $familycards->rt }}">
                            @error('rt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input type="text" class="form-control  @error('rw') is-invalid @enderror" id="rw" placeholder="Masukan RW" name="rw" value="{{ $familycards->rw }}">
                            @error('rw')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>          
            </div>
        </div>
@endsection

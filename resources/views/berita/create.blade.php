@extends('layout.side')

@section('content')

<body>
    <div class="container">
        <label for="inputdata">INPUT DATA BERITA</label>
        <div class="row">
            <div class="col-7">
				<form action="/uploadproses" method="POST" enctype="multipart/form-data">
    				{{ csrf_field() }}
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                        {{ $error }} <br/>
                                        @endforeach
                                    </div>
                                @endif
	                <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control  @error('judul') is-invalid @enderror" id="judul" placeholder="Masukan Judul" name="judul" value="{{ old('judul') }}">
                        @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror					
                    </div>
                    <div class="form-group">
                        <label for="berita">Berita</label>
                        <textarea type="text" class="form-control  @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Masukan Berita" name="keterangan" value="{{ old('keterangan') }}">
                        </textarea>	
                            @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror		
                    </div>
					<div class="form-group">
						<b>File Gambar</b><br/>
						<input type="file" name="file">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="nik" value="{{ Auth::user()->nik }}" id="nik">
                    </div>
					<input type="submit" value="Simpan" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>

@endsection



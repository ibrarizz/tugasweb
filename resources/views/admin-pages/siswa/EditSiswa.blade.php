@extends('layouts.admin')

@section('content')
	<div class="card mb-4" style="border: 1px solid #bbb;"> 
        <div style="color: white; font-weight: 500; background-color: #e74a3b;" class="card-header"> 
            <i class="fas fa-user me-1" style="margin-right: 5px;"></i> 
            Data Siswa 
        </div> 
        <div class="card-body">
			{{-- menampilkan error --}}
			@if(count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
         	<form enctype="multipart/form-data" action="{{ route('mastersiswa.update', $siswa->id) }}" method="POST"> 
			@csrf
			@method('PUT')
				<div class="form-group"> 
					<label for="nama">Nama</label> 
					<input type="text" class="form-control" id="nama" name='nama' value="{{ $siswa->nama }}"> 
				</div> 
				<div class="form-group"> 
					<label for="nisn">NISN</label> 
					<input type="text" class="form-control" id="nisn" name='nisn' value="{{ $siswa->nisn }}"> 
				</div> 
				<div class="form-group"> 
					<label for="alamat">Alamat</label> 
					<input type="text" class="form-control" id="alamat" name='alamat' value="{{ $siswa->alamat }}"> 
				</div> 
				<div class="form-group"> 
					<label for="jk">Jenis Kelamin</label> 
					<select class="form-select form-control" id="jk" name="jk"> 
						<option value="Laki-laki"@if($siswa->jk == 'Laki-laki') selected @endif>Laki-laki</option> 
						<option value="Perempuan"@if($siswa->jk == 'Perempuan') selected @endif>Perempuan</option> 
					</select> 
				</div> 
				<div class="form-group"> 
					<label for="foto">Foto Siswa</label><br> 
					<img src="/templete/img/{{ $siswa->foto }}" width="300" class="img-thumbnail"> 
					<input type="file" class="form-control-file" id="foto" name='foto' value="{{ $siswa->foto }}"> 
				</div> 
				<div class="form-group"> 
					<label for="about">About</label> 
					<textarea class="form-control" id="about" name='about'>{{ $siswa->about }}</textarea> 
				</div> 
				<div class="form-group"> 
					<input type="submit" class="btn btn-success" value="Simpan">
					<a href="/mastersiswa" class="btn btn-danger">Batal</a> 
				</div> 
			</form> 
        </div> 
    </div>

@endsection
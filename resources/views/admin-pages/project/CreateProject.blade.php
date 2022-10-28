@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-body">
					@if(count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<h4>Nama Siswa : {{ $siswa->nama }}</h4>
					<hr>
					<form enctype="multipart/form-data" action="{{ route('masterproject.store') }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="nama">Nama Project</label>
							<input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
							<input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
						</div>
						<div class="form-group">
							<label for="nisn">Deskripsi</label>
							<input type="textarea" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}">
						</div>
						<div class="form-group">
							<label for="alamat">Tanggal</label>
							<input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-success"  value="Simpan">
							<a href="/masterproject" class="btn btn-danger">Batal</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
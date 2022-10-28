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
					<hr>
					<form enctype="multipart/form-data" action="{{ route('masterproject.update', $project->id) }}" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="nama">Nama Project</label>
							<input type="text" class="form-control" id="nama" name="nama" value="{{ $project->nama }}">
						</div>
						<div class="form-group">
							<label for="nisn">Deskripsi</label>
							<input type="textarea" class="form-control" id="deskripsi" name="deskripsi" value="{{ $project->deskripsi }}">
						</div>
						<div class="form-group">
							<label for="alamat">Tanggal</label>
							<input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $project->tanggal }}">
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
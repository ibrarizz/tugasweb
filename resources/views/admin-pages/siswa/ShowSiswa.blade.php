@extends('layouts.admin')

@section('content')

	<div class="row">
		<div class="col-lg-4">
			<div class="card shadow mb-4">
				<div class="card-header">
					<i class="fas fa-id-card me-1" style="margin-right: 5px"></i>
					Profil Siswa
				</div>
				<div class="card-body text-center">
					<img src="{{ asset('/templete/img/'.$siswa->foto) }}" class="rounded-circle mt-3 mx-3 img-thumbnail" width="200" alt="">
					<h4 class="display-8">{{ $siswa->nama }}</h4>
				</div>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header">
					<i class="fas fa-id-card me-1" style="margin-right: 5px"></i>
					Kontak Siswa
				</div>
				<div class="card-body">
					@foreach($kontaks as $item)
						<li> {{ $item->jenis_kontak }} : {{ $item->pivot->deskripsi }}</li>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card shadow mb-4">
				<div class="card-header"> 
					<i class="fas fa-id-card me-1" style="margin-right: 5px"></i>
					Tentang Siswa 
				</div>
				<div class="card-body text-left">
					<li>NISN   : {{ $siswa->nisn }}</li>
					<hr>
					<li>Alamat : {{ $siswa->alamat }}</li>
					<hr>
					<li>Gender : {{ $siswa->jk }}</li>
				</div>
			</div>   
			<div class="card shadow mb-4">
				<div class="card-header">
					<i class="fas fa-id-card me-1" style="margin-right: 5px"></i>
					Pesan Siswa
				</div>
				<div class="card-body">
					<blockquote class="text-center mb-0">	
						<p class="mb-0 blockquote" style="font-style: italic">{{ $siswa->about }}</p>
						<footer class="blockquote"><cite class="Source title" style="font-size: 14px">~{{ $siswa->nama }}~</cite></footer>
					</blockquote>
				</div>
			</div>
		</div>
 	</div>

@endsection
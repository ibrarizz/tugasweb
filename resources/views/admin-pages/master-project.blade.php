@extends('layouts.admin')

@section('content')
	@if(session()->has('success'))
		<div class="alert alert-success alert-block">
			{{ session()->get('success') }}
			<buttton type="button" class="close" data-dismiss="alert">x</buttton>
		</div>
	@elseif(session()->has('successDelete'))
		<div class="alert alert-danger alert-block">
			{{ session()->get('successDelete') }}
			<buttton type="button" class="close" data-dismiss="alert">x</buttton>
		</div>
	@elseif(session()->has('successUpdate'))
	<div class="alert alert-success alert-block">
		{{ session()->get('successUpdate') }}
		<buttton type="button" class="close" data-dismiss="alert">x</buttton>
	</div>
	@endif
	<div class="row">
		<div class="col-5">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Siswa</h6>
				</div>
				<div class="card-body">
					<table class="table">
						<thead class="table-dark">
							<tr>
								<th scope="col">NISN</th>
								<th scope="col">Nama</th>
								<th scope="col" class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $item)
							<tr>
								<td>{{ $item->nisn }}</td>
								<td>{{ $item->nama }}</td>
								<td class="text-right">
									<a class="btn btn-sm btn-primary btn-circle" onclick="show( {{ $item->id }} )" ><i class="fas fa-folder"></i></a>
									<a href="{{ route('masterproject.tambah', $item->id) }}" class="btn btn-sm btn-success btn-circle"><i class="fas fa-plus"></i>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="card-footer">
					{{ $data->links() }}
				</div>
				</div>
				
			</div>
		</div>
		<div class="col-7">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Project</h6>
				</div>
				<div class="card-body" id="project">
					<h6 class="text-center">Pilih siswa terlebih dahulu</h6>
				</div>
			</div>
		</div>
	</div>

	<script>
		function show(id){
			$.get('/masterproject/'+id, function(data){
				$('#project').html(data);
			})
		}
	</script>
@endsection
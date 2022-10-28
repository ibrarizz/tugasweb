@if ($project->isEmpty())
    <h6>Siswa belum memiliki project</h6>
@else
@foreach($project as $item)
    <div class="card">
        <div class="card-header bg-dark">
            <strong style="font-style: italic" class="text-white">{{ $item->nama}}</strong>
        </div>
        <div class="card-body">
            <strong>Tanggal Project :</strong>
            <p>{{$item->tanggal}}</p>
            <strong>Deskripsi Project :</strong>
            <p>{{$item->deskripsi}}</p>
        </div>
       <div class="card-footer bg-grey d-flex">
            <form action="{{ route('masterproject.edit', $item->id) }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-pen"></i></button>
            </form>
            <form action="{{ route('masterproject.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></button>
            </form>
        </div>
    </div>
@endforeach
@endif
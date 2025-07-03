@extends('admin.main')

@section('judul', 'Team')

@section('konten')
<div class="mb-3">
  <a href="{{ route('teams.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> Tambah Team
  </a>
</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Team</h3>
  </div>
  <div class="card-body">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Posisi</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($teams as $index => $team)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $team->name }}</td>
          <td>{{ $team->position }}</td>
          <td>
            @if($team->image)
              <img src="{{ asset('storage/'.$team->image) }}" width="50" height="50">
            @else
              <span>Tidak Ada Foto</span>
            @endif
          </td>
          <td>
            <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-sm btn-warning">
              <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

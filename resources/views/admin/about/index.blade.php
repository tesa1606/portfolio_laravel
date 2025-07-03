@extends('admin.main')

@section('judul', 'About')

@section('konten')
<a href="{{ route('abouts.create') }}" class="btn btn-primary mb-3">
  <i class="fas fa-plus"></i> Tambah About
</a>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
  <div class="card-header"><h3 class="card-title">Data About</h3></div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($abouts as $index => $about)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>
            @if($about->gambar)
              <img src="{{ asset('storage/' . $about->gambar) }}" width="100">
            @else
              <small>Tidak ada gambar</small>
            @endif
          </td>
          <td>{{ Str::limit($about->deskripsi, 100) }}</td>
          <td>
            <a href="{{ route('abouts.edit', $about->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('abouts.destroy', $about->id) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center">Belum ada data</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

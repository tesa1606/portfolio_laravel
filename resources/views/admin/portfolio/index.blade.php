@extends('admin.main')

@section('judul', 'Data Portfolio')

@section('konten')

<div class="mb-3">
  <a href="{{ route('portfolios.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> Tambah Portfolio
  </a>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Daftar Portfolio</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead class="thead-dark">
        <tr class="text-center">
          <th style="width: 50px;">No</th>
          <th style="width: 150px;">Gambar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($portfolios as $index => $portfolio)
        <tr class="text-center align-middle">
          <td>{{ $index + 1 }}</td>
          <td>
            @if($portfolio->gambar)
              <img src="{{ asset('storage/' . $portfolio->gambar) }}" alt="Portfolio" width="100" class="img-thumbnail">
            @else
              <span class="text-muted">Tidak ada gambar</span>
            @endif
          </td>
          <td>
            <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-sm btn-warning">
              <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3" class="text-center text-muted">Tidak ada data portfolio.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection

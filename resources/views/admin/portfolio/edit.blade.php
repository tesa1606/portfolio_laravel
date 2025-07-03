@extends('admin.main')

@section('judul', 'Edit Portfolio')

@section('konten')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Form Edit Portfolio</h3>
  </div>
  <div class="card-body">
    <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="gambar">Gambar</label>
        @if ($portfolio->gambar)
          <div class="mb-2">
            <img src="{{ asset('storage/' . $portfolio->gambar) }}" alt="Preview" width="120" class="img-thumbnail">
          </div>
        @endif
        <input type="file" name="gambar" id="gambar" class="form-control-file @error('gambar') is-invalid @enderror">
        @error('gambar')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">
        <i class="fas fa-edit"></i> Update
      </button>
      <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>

@endsection

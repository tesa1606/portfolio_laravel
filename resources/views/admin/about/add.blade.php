@extends('admin.main')

@section('judul', 'Tambah About')

@section('konten')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Form Tambah About</h3>
  </div>
  <div class="card-body">
    <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control-file @error('gambar') is-invalid @enderror">
        @error('gambar')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Simpan
      </button>
      <a href="{{ route('abouts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>

@endsection

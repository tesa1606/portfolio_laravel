@extends('admin.main')

@section('judul', 'Tambah Portfolio')

@section('konten')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Form Tambah Portfolio</h3>
  </div>
  <div class="card-body">
    <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control-file @error('gambar') is-invalid @enderror">
        @error('gambar')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Simpan
      </button>
      <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>

@endsection

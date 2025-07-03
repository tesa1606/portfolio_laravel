@extends('admin.main')

@section('judul', 'Edit About')

@section('konten')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Form Edit About</h3>
  </div>
  <div class="card-body">
    <form action="{{ route('abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="gambar">Gambar (Opsional)</label><br>
        @if ($about->gambar)
          <img src="{{ asset('storage/' . $about->gambar) }}" alt="Gambar About" style="max-width: 150px;" class="mb-2">
        @endif
        <input type="file" name="gambar" id="gambar" class="form-control-file @error('gambar') is-invalid @enderror">
        @error('gambar')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $about->deskripsi) }}</textarea>
        @error('deskripsi')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">
        <i class="fas fa-edit"></i> Update
      </button>
      <a href="{{ route('abouts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>

@endsection

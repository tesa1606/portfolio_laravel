@extends('admin.main')

@section('judul', 'Tambah Contact')

@section('konten')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Form Tambah Kontak</h3>
  </div>
  <div class="card-body">
    <form action="{{ route('contacts.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" required>
        @error('alamat')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="nomor_telepon">Telepon</label>
        <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" value="{{ old('nomor_telepon') }}" required>
        @error('nomor_telepon')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="status_publish">Status Publish</label>
        <select name="status_publish" id="status_publish" class="form-control @error('status_publish') is-invalid @enderror" required>
          <option value="">-- Pilih Status --</option>
          <option value="1" {{ old('status_publish') == '1' ? 'selected' : '' }}>Publish</option>
          <option value="0" {{ old('status_publish') == '0' ? 'selected' : '' }}>Tidak Publish</option>
        </select>
        @error('status_publish')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Simpan
      </button>
      <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>

@endsection

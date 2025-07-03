@extends('admin.main')

@section('judul', 'Tambah Team')

@section('konten')
<form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Posisi</label>
    <input type="text" name="position" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="description" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label>Foto</label>
    <input type="file" name="image" class="form-control">
  </div>
  <div class="mb-3">
    <label>Facebook</label>
    <input type="text" name="facebook" class="form-control">
  </div>
  <div class="mb-3">
    <label>Twitter</label>
    <input type="text" name="twitter" class="form-control">
  </div>
  <div class="mb-3">
    <label>Instagram</label>
    <input type="text" name="instagram" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection

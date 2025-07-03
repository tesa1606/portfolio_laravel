@extends('admin.main')

@section('judul', 'Edit Team')

@section('konten')
<form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="name" class="form-control" value="{{ $team->name }}" required>
  </div>
  <div class="mb-3">
    <label>Posisi</label>
    <input type="text" name="position" class="form-control" value="{{ $team->position }}" required>
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="description" class="form-control">{{ $team->description }}</textarea>
  </div>
  <div class="mb-3">
    <label>Foto</label>
    @if($team->image)
      <img src="{{ asset('storage/'.$team->image) }}" width="100" class="mb-2">
    @endif
    <input type="file" name="image" class="form-control">
  </div>
  <div class="mb-3">
    <label>Facebook</label>
    <input type="text" name="facebook" class="form-control" value="{{ $team->facebook }}">
  </div>
  <div class="mb-3">
    <label>Twitter</label>
    <input type="text" name="twitter" class="form-control" value="{{ $team->twitter }}">
  </div>
  <div class="mb-3">
    <label>Instagram</label>
    <input type="text" name="instagram" class="form-control" value="{{ $team->instagram }}">
  </div>
  <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection

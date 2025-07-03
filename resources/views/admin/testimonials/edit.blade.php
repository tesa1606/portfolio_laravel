@extends('admin.main')

@section('judul', 'Edit Testimonial')

@section('konten')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Edit Testimonial</h3>
  </div>
  <div class="card-body">

    <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $testimonial->email }}" required>
      </div>

      <div class="form-group">
        <label for="message">Pesan</label>
        <textarea name="message" class="form-control" rows="4" required>{{ $testimonial->message }}</textarea>
      </div>

      <div class="form-group">
        <label for="status_publish">Status Publish</label>
        <select name="status_publish" class="form-control">
          <option value="1" {{ $testimonial->status_publish ? 'selected' : '' }}>Tampil</option>
          <option value="0" {{ !$testimonial->status_publish ? 'selected' : '' }}>Tersembunyi</option>
        </select>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Kembali</a>
      </div>

    </form>

  </div>
</div>

@endsection

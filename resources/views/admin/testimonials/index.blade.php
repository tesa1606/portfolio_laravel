@extends('admin.main')

@section('judul', 'Testimonial')

@section('konten')

<!-- Tabel Data -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Testimonial</h3>
  </div>
  <div class="card-body">

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th style="width: 50px;">No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Pesan</th>
          <th>Status Publish</th>
          <th style="width: 150px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($testimonials as $index => $testimonial)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $testimonial->name }}</td>
          <td>{{ $testimonial->email }}</td>
          <td>{{ $testimonial->message }}</td>
          <td>
            @if($testimonial->status_publish)
              <span class="badge badge-success">Tampil</span>
            @else
              <span class="badge badge-secondary">Tersembunyi</span>
            @endif
          </td>
          <td>
            <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-warning">
              <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
          <td colspan="6" class="text-center">Tidak ada data testimonial</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection

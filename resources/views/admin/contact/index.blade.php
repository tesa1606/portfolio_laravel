@extends('admin.main')

@section('judul', 'Contact')

@section('konten')

<!-- Tombol Tambah Data -->
<div class="mb-3">
  <a href="{{ route('contacts.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> Tambah Data
  </a>
</div>

<!-- Tabel Data -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Kontak</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th style="width: 50px;">No</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>Email</th>
          <th>Status Publish</th>
          <th style="width: 150px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($contacts as $index => $contact)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $contact->alamat }}</td>
          <td>{{ $contact->nomor_telepon }}</td>
          <td>{{ $contact->email }}</td>
          <td>
            @if($contact->status_publish)
              <span class="badge badge-success">Publish</span>
            @else
              <span class="badge badge-secondary">Tidak Publish</span>
            @endif
          </td>
          <td>
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-warning">
              <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
          <td colspan="6" class="text-center">Tidak ada data kontak</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection

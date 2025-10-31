@extends('layout.app')

@section('title', 'Tambah Jabatan')

@section('content')
<div class="page-header">
  <h4 class="page-title">Tambah Jabatan</h4>
</div>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h5>Form Jabatan Baru</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('jabatan.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" placeholder="Masukkan nama jabatan" required>
          </div>

          <div class="text-end">
            <a href="{{ route('jabatan.index') }}" class="btn btn-light me-2">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

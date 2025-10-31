@extends('layouts.app')

@section('title', 'Data PIC')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Data PIC</h4>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-12">
        <div class="card table-card">
          <div class="card-body">
            <div class="text-end p-4 pb-sm-2">
              <a href="#" 
                 class="btn btn-primary d-inline-flex align-items-center gap-2"
                 data-bs-toggle="modal"
                 data-bs-target="#pic-add-modal">
                <i class="ti ti-plus f-18"></i> Tambah PIC
              </a>
            </div>

            <div class="table-responsive">
              <table class="table table-hover" id="pc-dt-pic">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($pics as $pic)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        <img src="{{ asset('assets/images/user/avatar-8.jpg') }}" alt="avatar" class="avtar rounded-circle" style="width:40px;height:40px;object-fit:cover;" />
                      </td>
                      <td>{{ $pic->username }}</td>
                      <td>{{ $pic->nama }}</td>
                      <td>{{ $pic->jabatan ? $pic->jabatan->nama_jabatan : '-' }}</td>
                      <td class="text-center">
                        <ul class="list-inline me-auto mb-0">
                          <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                            <a href="#" 
                               class="avtar avtar-xs btn-link-success btn-pc-default"
                               data-bs-toggle="modal"
                               data-bs-target="#pic-edit-modal"
                               data-id="{{ $pic->id_pic }}"
                               data-username="{{ $pic->username }}"
                               data-nama="{{ $pic->nama }}"
                               data-jabatan="{{ $pic->id_jabatan }}">
                              <i class="ti ti-edit-circle f-18"></i>
                            </a>
                          </li>
                          <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                            <form action="{{ route('pics.destroy', $pic->id_pic) }}" method="POST" class="delete-form d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="button" class="avtar avtar-xs btn-link-danger btn-pc-default btn-delete border-0 bg-transparent">
                                <i class="ti ti-trash f-18"></i>
                              </button>
                            </form>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center text-muted">Belum ada data PIC</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="pic-add-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('pics.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="mb-0">Tambah PIC</h5>
          <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default ms-auto" data-bs-dismiss="modal">
            <i class="ti ti-x f-20"></i>
          </a>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select name="id_jabatan" class="form-select">
              <option value="">-- Pilih Jabatan --</option>
              @foreach($jabatans as $jab)
                <option value="{{ $jab->id_jabatan }}">{{ $jab->nama_jabatan }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-link-danger btn-pc-default" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="pic-edit-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <form id="picEditForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="mb-0">Edit PIC</h5>
          <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default ms-auto" data-bs-dismiss="modal">
            <i class="ti ti-x f-20"></i>
          </a>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" id="editUsernamePic" name="username" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password (kosongkan bila tidak ingin mengganti)</label>
            <input type="password" id="editPasswordPic" name="password" class="form-control" placeholder="Masukkan password baru">
          </div>
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" id="editNamaPic" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select id="editJabatanPic" name="id_jabatan" class="form-select">
              <option value="">-- Pilih Jabatan --</option>
              @foreach($jabatans as $jab)
                <option value="{{ $jab->id_jabatan }}">{{ $jab->nama_jabatan }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-link-danger btn-pc-default" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/plugins/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/js/plugins/sweetalert2.all.min.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const tableEl = document.querySelector('#pc-dt-pic');
  if (tableEl) {
    new simpleDatatables.DataTable(tableEl, {
      sortable: false,
      perPage: 5
    });
  }

  // --- Edit modal dynamic data
  const editModal = document.getElementById('pic-edit-modal');
  editModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const username = button.getAttribute('data-username');
    const nama = button.getAttribute('data-nama');
    const jabatan = button.getAttribute('data-jabatan');
    const form = editModal.querySelector('#picEditForm');
    const inputUsername = editModal.querySelector('#editUsernamePic');
    const inputPassword = editModal.querySelector('#editPasswordPic');
    const inputNama = editModal.querySelector('#editNamaPic');
    const selectJabatan = editModal.querySelector('#editJabatanPic');
    form.action = `/pics/${id}`;
    inputUsername.value = username;
    inputPassword.value = '';
    inputNama.value = nama;
    if (jabatan) selectJabatan.value = jabatan; else selectJabatan.value = '';
  });

  // --- SweetAlert success (from session)
  @if(session('success'))
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: "{{ session('success') }}",
      confirmButtonColor: '#198754',
      confirmButtonText: 'OK'
    });
  @endif

  // --- SweetAlert confirm delete
  const deleteButtons = document.querySelectorAll('.btn-delete');
  deleteButtons.forEach(btn => {
    btn.addEventListener('click', function(e) {
      const form = this.closest('.delete-form');
      Swal.fire({
        title: 'Yakin hapus?',
        text: "Data PIC ini akan dihapus permanen.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
});
</script>
@endpush

@endsection
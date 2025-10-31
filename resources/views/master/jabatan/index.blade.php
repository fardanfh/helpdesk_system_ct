@extends('layouts.app')

@section('title', 'Data Jabatan')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Data Jabatan</h4>
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
                 data-bs-target="#jabatan-add-modal">
                <i class="ti ti-plus f-18"></i> Tambah Jabatan
              </a>
            </div>

            <div class="table-responsive">
              <table class="table table-hover" id="pc-dt-simple">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Jabatan</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($jabatans as $jabatan)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $jabatan->nama_jabatan }}</td>
                      <td class="text-center">
                        <ul class="list-inline me-auto mb-0">
                          <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                            <a href="#" 
                               class="avtar avtar-xs btn-link-success btn-pc-default"
                               data-bs-toggle="modal"
                               data-bs-target="#jabatan-edit-modal"
                               data-id="{{ $jabatan->id_jabatan }}"
                               data-nama="{{ $jabatan->nama_jabatan }}">
                              <i class="ti ti-edit-circle f-18"></i>
                            </a>
                          </li>
                          <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                            <form action="{{ route('jabatan.destroy', $jabatan->id_jabatan) }}" method="POST" class="delete-form d-inline">
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
                      <td colspan="3" class="text-center text-muted">Belum ada data jabatan</td>
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
<div class="modal fade" id="jabatan-add-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('jabatan.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="mb-0">Tambah Jabatan</h5>
          <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default ms-auto" data-bs-dismiss="modal">
            <i class="ti ti-x f-20"></i>
          </a>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control" placeholder="Masukkan nama jabatan" required>
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
<div class="modal fade" id="jabatan-edit-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <form id="editForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="mb-0">Edit Jabatan</h5>
          <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default ms-auto" data-bs-dismiss="modal">
            <i class="ti ti-x f-20"></i>
          </a>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Jabatan</label>
            <input type="text" id="editNamaJabatan" name="nama_jabatan" class="form-control" required>
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
<script src="{{ asset('assets/js/elements/ac-alert.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const tableEl = document.querySelector('#pc-dt-simple');
  if (tableEl) {
    new simpleDatatables.DataTable(tableEl, {
      sortable: false,
      perPage: 5
    });
  }

  // --- Edit modal dynamic data
  const editModal = document.getElementById('jabatan-edit-modal');
  editModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const nama = button.getAttribute('data-nama');
    const form = editModal.querySelector('#editForm');
    const inputNama = editModal.querySelector('#editNamaJabatan');
    form.action = `/jabatan/${id}`;
    inputNama.value = nama;
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
        text: "Data jabatan ini akan dihapus permanen.",
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

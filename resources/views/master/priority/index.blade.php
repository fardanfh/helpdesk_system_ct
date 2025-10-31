@extends('layouts.app')

@section('title', 'Data Priority')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Data Priority</h4>
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
                 data-bs-target="#priority-add-modal">
                <i class="ti ti-plus f-18"></i> Tambah Priority
              </a>
            </div>

            <div class="table-responsive">
              <table class="table table-hover" id="pc-dt-priority">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Priority</th>
                    <th>Warna</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($priorities as $priority)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $priority->name }}</td>
                      <td>
                        <span class="badge" style="background-color: {{ $priority->color ?? '#6c757d' }};">&nbsp;&nbsp;&nbsp;</span>
                        <small class="ms-2">{{ $priority->color }}</small>
                      </td>
                      <td class="text-center">
                        <ul class="list-inline me-auto mb-0">
                          <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                            <a href="#" 
                               class="avtar avtar-xs btn-link-success btn-pc-default"
                               data-bs-toggle="modal"
                               data-bs-target="#priority-edit-modal"
                               data-id="{{ $priority->id }}"
                               data-name="{{ $priority->name }}"
                               data-color="{{ $priority->color }}">
                              <i class="ti ti-edit-circle f-18"></i>
                            </a>
                          </li>
                          <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                            <form action="{{ route('priority.destroy', $priority->id) }}" method="POST" class="delete-form d-inline">
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
                      <td colspan="4" class="text-center text-muted">Belum ada data priority</td>
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
<div class="modal fade" id="priority-add-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('priority.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="mb-0">Tambah Priority</h5>
          <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default ms-auto" data-bs-dismiss="modal">
            <i class="ti ti-x f-20"></i>
          </a>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Priority</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama priority" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Warna</label>
            <input type="color" name="color" id="addColorPriority" class="form-control form-control-color" value="#6c757d" title="Choose your color">
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
<div class="modal fade" id="priority-edit-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <form id="priorityEditForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="mb-0">Edit Priority</h5>
          <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default ms-auto" data-bs-dismiss="modal">
            <i class="ti ti-x f-20"></i>
          </a>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Priority</label>
            <input type="text" id="editNamePriority" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Warna</label>
            <input type="color" id="editColorPriority" name="color" class="form-control form-control-color">
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
  const tableEl = document.querySelector('#pc-dt-priority');
  if (tableEl) {
    new simpleDatatables.DataTable(tableEl, {
      sortable: false,
      perPage: 5
    });
  }

  // --- Edit modal dynamic data
  const editModal = document.getElementById('priority-edit-modal');
  editModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const name = button.getAttribute('data-name');
    const color = button.getAttribute('data-color');
    const form = editModal.querySelector('#priorityEditForm');
    const inputName = editModal.querySelector('#editNamePriority');
    const inputColor = editModal.querySelector('#editColorPriority');
    form.action = `/priority/${id}`;
    inputName.value = name;
    inputColor.value = color;
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
        text: "Data priority ini akan dihapus permanen.",
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
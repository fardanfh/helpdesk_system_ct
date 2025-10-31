@extends('layouts.app')

@section('title', 'Data Laporan')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Data Laporan</h4>
  </div>
  <div class="card-body">
    <div class="card table-card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover" id="pc-dt-laporan">
            <thead>
              <tr>
                <th>#</th>
                <th>No Laporan</th>
                <th>Pelapor</th>
                <th>Lokasi</th>
                <th>Area</th>
                <th>Permasalahan</th>
                <th>PIC</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($laporans as $lap)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $lap->no_laporan }}</td>
                  <td>{{ $lap->nama_pelapor }}</td>
                  <td>{{ $lap->lokasi ? $lap->lokasi->nama_lokasi : '-' }}</td>
                  <td>{{ $lap->area ? $lap->area->nama_area : '-' }}</td>
                  <td>{{ $lap->permasalahan ? $lap->permasalahan->nama_permasalahan : '-' }}</td>
                  <td>{{ $lap->pic ? $lap->pic->nama : '-' }}</td>
                  <td class="text-center">
                    <a href="{{ route('laporans.show', $lap->id_laporan) }}" class="btn btn-sm btn-outline-primary">View</a>
                    @can('delete', $lap)
                      <form action="{{ route('laporans.destroy', $lap->id_laporan) }}" method="POST" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete">Hapus</button>
                      </form>
                    @endcan
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center text-muted">Belum ada laporan</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/plugins/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/js/plugins/sweetalert2.all.min.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const tableEl = document.querySelector('#pc-dt-laporan');
  if (tableEl) {
    new simpleDatatables.DataTable(tableEl, { sortable: false, perPage: 10 });
  }

  const deleteButtons = document.querySelectorAll('.btn-delete');
  deleteButtons.forEach(btn => {
    btn.addEventListener('click', function () {
      const form = this.closest('.delete-form');
      Swal.fire({
        title: 'Yakin hapus?',
        text: 'Laporan akan dihapus secara permanen.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
      }).then((res) => {
        if (res.isConfirmed) form.submit();
      });
    });
  });
});
</script>
@endpush

@endsection
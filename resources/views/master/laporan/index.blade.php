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
        {{-- DEBUG: show session and flags for troubleshooting (temporary) --}}
        @if(session('pic_id') || session('admin_id'))
        <div class="mb-3 p-2 border rounded bg-light">
          <strong>Debug:</strong>
          <span class="badge bg-primary ms-2">session pic_id: {{ session('pic_id') ?? 'null' }}</span>
          <span class="badge bg-secondary ms-2">isStaffGaIt: {{ isset($isStaffGaIt) ? ($isStaffGaIt ? 'true' : 'false') : 'n/a' }}</span>
          <span class="badge bg-info ms-2">canInlineEdit: {{ isset($canInlineEdit) ? ($canInlineEdit ? 'true' : 'false') : 'n/a' }}</span>
          <span class="badge bg-dark ms-2">URL: {{ request()->fullUrl() }}</span>
        </div>
        @endif
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
                <th>Status</th>
                <th>Prioritas</th>
                <th>PIC</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($laporans as $lap)
          <tr data-id="{{ $lap->id_laporan }}"
            data-no_laporan="{{ $lap->no_laporan }}"
            data-nama_pelapor="{{ $lap->nama_pelapor }}"
            data-lokasi="{{ $lap->lokasi ? $lap->lokasi->nama_lokasi : '' }}"
            data-area="{{ $lap->area ? $lap->area->nama_area : '' }}"
            data-permasalahan="{{ $lap->permasalahan ? $lap->permasalahan->nama_permasalahan : '' }}"
            data-deskripsi="{{ $lap->deskripsi_laporan ?? '' }}"
            data-keterangan="{{ $lap->keterangan ?? '' }}"
            data-foto="{{ $lap->foto_permasalahan ?? '' }}"
            data-created_at="{{ $lap->created_at }}"
            data-updated_at="{{ $lap->updated_at }}"
          >
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      {{-- Laporan badge (danger) with icon --}}
                      <span class="badge bg-danger text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Laporan: {{ $lap->no_laporan }}">
                        <i class="bi bi-ticket-perforated-fill"></i>
                        <span class="ms-1">{{ $lap->no_laporan }}</span>
                      </span>
                    </td>
                    <td>{{ $lap->nama_pelapor }}</td>
                    <td>{{ $lap->lokasi ? $lap->lokasi->nama_lokasi : '-' }}</td>
                    <td>{{ $lap->area ? $lap->area->nama_area : '-' }}</td>
                    <td>{{ $lap->permasalahan ? $lap->permasalahan->nama_permasalahan : '-' }}</td>

                    {{-- Status column (show badge + select for inline edit if allowed) --}}
                    <td>
                      @php
                        $s = $lap->status ?? null;
                        $sname = $s ? $s->name : '-';
                        $sclass = 'bg-secondary';
                        if ($sname) {
                          $sn = strtolower($sname);
                          if (strpos($sn, 'selesai') !== false || strpos($sn, 'done') !== false) $sclass = 'bg-success';
                          elseif (strpos($sn, 'progres') !== false || strpos($sn, 'proses') !== false) $sclass = 'bg-warning';
                          elseif (strpos($sn, 'baru') !== false || strpos($sn, 'new') !== false) $sclass = 'bg-primary';
                        }
                      @endphp

                      @if(!empty($canInlineEdit))
                        @php
                          $siconClass = 'bi-dash-lg';
                          $sn = strtolower($sname);
                          // Map status name to icon and color class
                          if (strpos($sn, 'selesai') !== false || strpos($sn, 'done') !== false) {
                            $siconClass = 'bi-check-circle-fill';
                            $sclass = 'bg-success';
                          } elseif (
                            strpos($sn, 'progres') !== false || strpos($sn, 'proses') !== false ||
                            strpos($sn, 'process') !== false || strpos($sn, 'processing') !== false
                          ) {
                            // proses/process -> clock icon, primary color
                            $siconClass = 'bi-clock';
                            $sclass = 'bg-primary';
                          } elseif (strpos($sn, 'pending') !== false || strpos($sn, 'tunda') !== false) {
                            $siconClass = 'bi-hourglass';
                            $sclass = 'bg-info';
                          } elseif (strpos($sn, 'cancel') !== false || strpos($sn, 'batal') !== false) {
                            $siconClass = 'bi-x-circle-fill';
                            $sclass = 'bg-danger';
                          } elseif (strpos($sn, 'baru') !== false || strpos($sn, 'new') !== false) {
                            $siconClass = 'bi-plus-circle-fill';
                            $sclass = 'bg-primary';
                          }
                        @endphp
                        <span class="badge {{ $sclass }} status-badge" data-bs-toggle="tooltip" data-bs-placement="top" title="Status: {{ $sname }}"> <i class="bi {{ $siconClass }} me-1"></i> {{ $sname }}</span>
                        <select class="form-select form-select-sm d-inline-block ms-2 inline-update" data-field="status_id" data-id="{{ $lap->id_laporan }}" style="width:180px;">
                          <option value="">-</option>
                          @foreach($statuses as $st)
                            <option value="{{ $st->id }}" @if(optional($lap->status)->id == $st->id) selected @endif>{{ $st->name }}</option>
                          @endforeach
                        </select>
                        <span class="ms-2 inline-spinner" style="display:none;">
                          <div class="spinner-border spinner-border-sm text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
                        </span>
                      @elseif(!empty($isStaffGaIt))
                        @php
                          $siconClass = 'bi-dash-lg';
                          $sn = strtolower($sname);
                          if (strpos($sn, 'selesai') !== false || strpos($sn, 'done') !== false) {
                            $siconClass = 'bi-check-circle-fill';
                            $sclass = 'bg-success';
                          } elseif (
                            strpos($sn, 'progres') !== false || strpos($sn, 'proses') !== false ||
                            strpos($sn, 'process') !== false || strpos($sn, 'processing') !== false
                          ) {
                            // proses/process -> clock icon, primary color
                            $siconClass = 'bi-clock';
                            $sclass = 'bg-primary';
                          } elseif (strpos($sn, 'pending') !== false || strpos($sn, 'tunda') !== false) {
                            $siconClass = 'bi-hourglass';
                            $sclass = 'bg-info';
                          } elseif (strpos($sn, 'cancel') !== false || strpos($sn, 'batal') !== false) {
                            $siconClass = 'bi-x-circle-fill';
                            $sclass = 'bg-danger';
                          } elseif (strpos($sn, 'baru') !== false || strpos($sn, 'new') !== false) {
                            $siconClass = 'bi-plus-circle-fill';
                            $sclass = 'bg-primary';
                          }
                        @endphp
                        <span class="badge {{ $sclass }} status-badge" data-bs-toggle="tooltip" data-bs-placement="top" title="Status: {{ $sname }}"> <i class="bi {{ $siconClass }} me-1"></i> {{ $sname }}</span>
                      @else
                        {{-- Read-only badge when inline edit not allowed --}}
                        <span class="badge {{ $sclass }} status-badge">{{ $sname == '-' ? '-' : $sname }}</span>
                      @endif
                    </td>

                    {{-- Priority column (read-only or inline editable when allowed) --}}
                    <td>
                      @php
                        $p = $lap->priority ?? null;
                        $pname = $p ? $p->name : '-';
                        $pclass = 'bg-secondary';
                        $pn = strtolower($pname);
                        // urgent should use dark badge per request
                        if (strpos($pn, 'urgent') !== false || strpos($pn, 'darurat') !== false || strpos($pn, 'high') !== false || strpos($pn, 'tinggi') !== false) $pclass = 'bg-dark';
                        elseif (strpos($pn, 'medium') !== false || strpos($pn, 'sedang') !== false || strpos($pn, 'menengah') !== false) $pclass = 'bg-warning';
                        elseif (strpos($pn, 'low') !== false || strpos($pn, 'rendah') !== false) $pclass = 'bg-info';
                      @endphp

                      @if(!empty($canInlineEdit))
                        @php
                          $piconClass = 'bi-dash-lg';
                          $pn = strtolower($pname);
                            if (strpos($pn, 'urgent') !== false || strpos($pn, 'darurat') !== false) { $piconClass = 'bi-exclamation-triangle-fill'; $pclass = 'bg-dark'; }
                            elseif (strpos($pn, 'high') !== false || strpos($pn, 'tinggi') !== false) { $piconClass = 'bi-fire'; $pclass = 'bg-danger'; }
                          elseif (strpos($pn, 'medium') !== false || strpos($pn, 'sedang') !== false) { $piconClass = 'bi-exclamation-triangle-fill'; $pclass = 'bg-warning'; }
                          elseif (strpos($pn, 'low') !== false || strpos($pn, 'rendah') !== false) { $piconClass = 'bi-info-circle'; $pclass = 'bg-info'; }
                        @endphp
                        <span class="badge {{ $pclass }} priority-badge" data-bs-toggle="tooltip" data-bs-placement="top" title="Prioritas: {{ $pname }}"> <i class="bi {{ $piconClass }} me-1"></i> {{ $pname }}</span>
                        <select class="form-select form-select-sm d-inline-block ms-2 inline-update" data-field="priority_id" data-id="{{ $lap->id_laporan }}" style="width:150px;">
                          <option value="">-</option>
                          @foreach($priorities as $pr)
                            <option value="{{ $pr->id }}" @if(optional($lap->priority)->id == $pr->id) selected @endif>{{ $pr->name }}</option>
                          @endforeach
                        </select>
                        <span class="ms-2 inline-spinner" style="display:none;">
                          <div class="spinner-border spinner-border-sm text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
                        </span>
                      @elseif(!empty($isStaffGaIt))
                        @php
                          $piconClass = 'bi-dash-lg';
                          $pn = strtolower($pname);
                          if (strpos($pn, 'urgent') !== false || strpos($pn, 'darurat') !== false) { $piconClass = 'bi-exclamation-triangle-fill'; $pclass = 'bg-dark'; }
                          elseif (strpos($pn, 'high') !== false || strpos($pn, 'tinggi') !== false) { $piconClass = 'bi-fire'; $pclass = 'bg-danger'; }
                          elseif (strpos($pn, 'medium') !== false || strpos($pn, 'sedang') !== false || strpos($pn, 'menengah') !== false) { $piconClass = 'bi-exclamation-triangle-fill'; $pclass = 'bg-warning'; }
                          elseif (strpos($pn, 'low') !== false || strpos($pn, 'rendah') !== false) { $piconClass = 'bi-info-circle'; $pclass = 'bg-info'; }
                        @endphp
                        <span class="badge {{ $pclass }} priority-badge" data-bs-toggle="tooltip" data-bs-placement="top" title="Prioritas: {{ $pname }}"> <i class="bi {{ $piconClass }} me-1"></i> {{ $pname }}</span>
                      @else
                        <span class="badge {{ $pclass }} priority-badge">{{ $pname == '-' ? '-' : $pname }}</span>
                      @endif
                    </td>

                    {{-- PIC assign column --}}
                    <td>
                      @if(!empty($canInlineEdit))
                        <select class="form-select form-select-sm inline-update" data-field="id_pic" data-id="{{ $lap->id_laporan }}" style="width:200px; display:inline-block;">
                          <option value="">-- Unassigned --</option>
                          @foreach($pics as $pic)
                            <option value="{{ $pic->id_pic }}" @if(optional($lap->pic)->id_pic == $pic->id_pic) selected @endif>{{ $pic->nama }} ({{ optional($pic->jabatan)->nama_jabatan }})</option>
                          @endforeach
                        </select>
                        <span class="ms-2 inline-spinner" style="display:none;">
                          <div class="spinner-border spinner-border-sm text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
                        </span>
                      @elseif(!empty($isStaffGaIt))
                        {{ $lap->pic ? $lap->pic->nama : '-' }}
                      @else
                        {{ $lap->pic ? $lap->pic->nama : '-' }}
                      @endif
                    </td>

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

  // Inline update handlers for select controls (PIC, status, priority)
  const inlineControls = document.querySelectorAll('.inline-update');
  const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
  const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : null;

  // initialize bootstrap tooltips if available
  if (typeof bootstrap !== 'undefined') {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (el) {
      try { new bootstrap.Tooltip(el); } catch (e) { /* ignore */ }
    });
  }

  inlineControls.forEach(ctrl => {
    ctrl.addEventListener('change', function (e) {
      const field = this.dataset.field;
      const id = this.dataset.id;
      const value = this.value;
      const original = this;

  // optimistic UI: disable control and show spinner
  original.disabled = true;
  const spinner = original.parentElement.querySelector('.inline-spinner');
  if (spinner) spinner.style.display = 'inline-block';

      const payload = {};
      payload[field] = value === '' ? null : value;

  const baseLaporanUrl = "{{ url('laporans') }}";
  fetch(`${baseLaporanUrl}/${id}`, {
        method: 'PATCH',
        credentials: 'same-origin',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify(payload)
      }).then(r => r.json())
        .then(json => {
          if (json && json.success) {
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: json.message || 'Updated',
              showConfirmButton: false,
              timer: 1500
            });

            // Update badge text/classes when status or priority changed
            if (field === 'status_id') {
              const row = document.querySelector(`tr[data-id='${id}']`);
              if (row) {
                const badge = row.querySelector('.status-badge');
                if (badge && json.data.status) {
                  const name = (json.data.status.name || '').toLowerCase();
                  // map to icon and color (keep in sync with server-side)
                  let cls = 'bg-secondary';
                  let iconCls = 'bi-dash-lg';
                  if (name.includes('selesai') || name.includes('done')) { cls = 'bg-success'; iconCls = 'bi-check-circle-fill'; }
                  else if (name.includes('progres') || name.includes('proses') || name.includes('process') || name.includes('processing')) { cls = 'bg-primary'; iconCls = 'bi-clock'; }
                  else if (name.includes('pending') || name.includes('tunda')) { cls = 'bg-info'; iconCls = 'bi-hourglass'; }
                  else if (name.includes('cancel') || name.includes('batal')) { cls = 'bg-danger'; iconCls = 'bi-x-circle-fill'; }
                  else if (name.includes('baru') || name.includes('new')) { cls = 'bg-primary'; iconCls = 'bi-plus-circle-fill'; }

                  badge.className = 'badge status-badge ' + cls;
                  badge.innerHTML = `<i class="bi ${iconCls} me-1"></i> ${json.data.status.name || ''}`;
                  // update tooltip text if bootstrap tooltip initialized
                  try { if (badge._tippy) badge._tippy.setContent('Status: ' + (json.data.status.name || '')); } catch(e){}
                }
              }
            }
            if (field === 'priority_id') {
              const row = document.querySelector(`tr[data-id='${id}']`);
              if (row) {
                const badge = row.querySelector('.priority-badge');
                if (badge && json.data.priority) {
                  const name = (json.data.priority.name || '').toLowerCase();
                  let cls = 'bg-secondary';
                  let iconCls = 'bi-dash-lg';
                  if (name.includes('urgent') || name.includes('darurat')) { cls = 'bg-dark'; iconCls = 'bi-exclamation-triangle-fill'; }
                  else if (name.includes('high') || name.includes('tinggi')) { cls = 'bg-danger'; iconCls = 'bi-fire'; }
                  else if (name.includes('medium') || name.includes('sedang') || name.includes('menengah')) { cls = 'bg-warning'; iconCls = 'bi-exclamation-triangle-fill'; }
                  else if (name.includes('low') || name.includes('rendah')) { cls = 'bg-info'; iconCls = 'bi-info-circle'; }

                  badge.className = 'badge priority-badge ' + cls;
                  badge.innerHTML = `<i class="bi ${iconCls} me-1"></i> ${json.data.priority.name || ''}`;
                }
              }
            }

            if (field === 'id_pic') {
              // optionally update displayed PIC name elsewhere if needed
            }
          } else {
            Swal.fire({ icon: 'error', title: 'Error', text: (json && json.message) ? json.message : 'Update failed' });
          }
        }).catch(err => {
          console.error(err);
          Swal.fire({ icon: 'error', title: 'Error', text: 'Update failed' });
        }).finally(() => {
          original.disabled = false;
          if (spinner) spinner.style.display = 'none';
        });
    });
  });
});
</script>
@endpush

@endsection

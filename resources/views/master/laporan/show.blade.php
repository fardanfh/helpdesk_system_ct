@extends('layouts.app')

@section('title', 'Detail Laporan')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4>Detail Laporan</h4>
    <a href="{{ route('laporans.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
  </div>
  <div class="card-body">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body text-center">
            @if($laporan->foto_permasalahan)
              <img src="{{ asset($laporan->foto_permasalahan) }}" class="img-fluid rounded mb-3" alt="Foto" style="max-height:260px; object-fit:cover;" />
            @else
              <div class="border rounded p-5 text-muted">No image</div>
            @endif

            <dl class="row text-start small">
              <dt class="col-5">No Laporan</dt>
              <dd class="col-7">{{ $laporan->no_laporan }}</dd>

              <dt class="col-5">Pelapor</dt>
              <dd class="col-7">{{ $laporan->nama_pelapor }}</dd>

              <dt class="col-5">Lokasi</dt>
              <dd class="col-7">{{ $laporan->lokasi ? $laporan->lokasi->nama_lokasi : '-' }}</dd>

              <dt class="col-5">Area</dt>
              <dd class="col-7">{{ $laporan->area ? $laporan->area->nama_area : '-' }}</dd>

              <dt class="col-5">Permasalahan</dt>
              <dd class="col-7">{{ $laporan->permasalahan ? $laporan->permasalahan->nama_permasalahan : '-' }}</dd>

              <dt class="col-5">Dibuat</dt>
              <dd class="col-7">{{ $laporan->created_at }}</dd>

              <dt class="col-5">Terakhir diubah</dt>
              <dd class="col-7">{{ $laporan->updated_at }}</dd>
            </dl>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="mb-3">Perincian & Update</h5>

            <div class="mb-3">
              <label class="form-label">Deskripsi Laporan</label>
              <textarea class="form-control" rows="4" id="detail_deskripsi" readonly>{{ $laporan->deskripsi_laporan }}</textarea>
            </div>

            <form id="detailUpdateForm">
              @csrf
              @method('PATCH')
              <input type="hidden" id="lap_id" value="{{ $laporan->id_laporan }}" />

              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Status</label>
                  <select id="detail_status" class="form-select">
                    <option value="">-- Pilih Status --</option>
                    @foreach($statuses as $st)
                      <option value="{{ $st->id }}" @if(optional($laporan->status)->id == $st->id) selected @endif>{{ $st->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Prioritas</label>
                  <select id="detail_priority" class="form-select">
                    <option value="">-- Pilih Prioritas --</option>
                    @foreach($priorities as $pr)
                      <option value="{{ $pr->id }}" @if(optional($laporan->priority)->id == $pr->id) selected @endif>{{ $pr->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-12">
                  <label class="form-label">PIC</label>
                  <select id="detail_pic" class="form-select">
                    <option value="">-- Unassigned --</option>
                    @foreach($pics as $pic)
                      <option value="{{ $pic->id_pic }}" @if(optional($laporan->pic)->id_pic == $pic->id_pic) selected @endif>{{ $pic->nama }} ({{ optional($pic->jabatan)->nama_jabatan }})</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-12 mt-3">
                  <label class="form-label">Keterangan / Catatan</label>
                  <textarea id="detail_keterangan" class="form-control" rows="3">{{ $laporan->keterangan }}</textarea>
                </div>

                <div class="col-md-6 mt-3">
                  <label class="form-label">Tanggal Dikerjakan</label>
                  <input type="date" id="detail_tgl_dikerjakan" class="form-control" value="{{ $laporan->tgl_dikerjakan ? \Carbon\Carbon::parse($laporan->tgl_dikerjakan)->format('Y-m-d') : '' }}" />
                </div>

                <div class="col-md-6 mt-3">
                  <label class="form-label">Tanggal Selesai</label>
                  <input type="date" id="detail_tgl_selesai" class="form-control" value="{{ $laporan->tgl_selesai ? \Carbon\Carbon::parse($laporan->tgl_selesai)->format('Y-m-d') : '' }}" />
                </div>

                <div class="col-12 mt-3">
                  <label class="form-label">Tindakan Perbaikan</label>
                  <textarea id="detail_tindakan" class="form-control" rows="3">{{ $laporan->tindakan_perbaikan }}</textarea>
                </div>

                <div class="col-md-6 mt-3">
                  <label class="form-label">Total Nilai Perbaikan</label>
                  <input type="number" step="0.01" id="detail_total_nilai" class="form-control" value="{{ $laporan->total_nilai_perbaikan ?? '' }}" />
                </div>

                <div class="col-md-6 mt-3">
                  <label class="form-label">Foto Perbaikan</label>
                  @if($laporan->foto_perbaikan)
                    <div class="mb-2"><img src="{{ asset($laporan->foto_perbaikan) }}" class="img-fluid rounded" style="max-height:120px; object-fit:cover;" alt="Foto Perbaikan" /></div>
                  @endif
                  <input type="file" id="detail_foto_perbaikan" class="form-control" accept="image/*" />
                </div>
              </div>

              <div class="mt-4 d-flex justify-content-end">
                <button type="button" id="btnSaveDetail" class="btn btn-primary">
                  <span id="btnSaveSpinner" class="spinner-border spinner-border-sm me-2" style="display:none;"></span>
                  Simpan Perubahan
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const id = document.getElementById('lap_id').value;
  const saveBtn = document.getElementById('btnSaveDetail');
  const spinner = document.getElementById('btnSaveSpinner');

    saveBtn.addEventListener('click', function () {
    const formData = new FormData();
    formData.append('status_id', document.getElementById('detail_status').value || '');
    formData.append('priority_id', document.getElementById('detail_priority').value || '');
    formData.append('id_pic', document.getElementById('detail_pic').value || '');
    formData.append('keterangan', document.getElementById('detail_keterangan').value || '');
    formData.append('tgl_dikerjakan', document.getElementById('detail_tgl_dikerjakan').value || '');
    formData.append('tgl_selesai', document.getElementById('detail_tgl_selesai').value || '');
    formData.append('tindakan_perbaikan', document.getElementById('detail_tindakan').value || '');
    formData.append('total_nilai_perbaikan', document.getElementById('detail_total_nilai').value || '');
  // Include method override so multipart form-data is parsed correctly by PHP
  formData.append('_method', 'PATCH');

    const fileInput = document.getElementById('detail_foto_perbaikan');
    if (fileInput && fileInput.files && fileInput.files.length > 0) {
      formData.append('foto_perbaikan', fileInput.files[0]);
    }

    saveBtn.disabled = true; spinner.style.display = '';

    fetch(`{{ url('laporans') }}/${id}`, {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Accept': 'application/json',
        'X-CSRF-TOKEN': csrf,
        'X-Requested-With': 'XMLHttpRequest'
      },
      body: formData
    }).then(r => r.json())
      .then(json => {
        if (json && json.success) {
          Swal.fire({ position: 'top-end', icon: 'success', title: json.message || 'Updated', showConfirmButton: false, timer: 1200 });
          setTimeout(() => location.reload(), 700);
        } else {
          Swal.fire({ icon: 'error', title: 'Error', text: json && json.message ? json.message : 'Update failed' });
        }
      }).catch(err => {
        console.error(err);
        Swal.fire({ icon: 'error', title: 'Error', text: 'Update failed' });
      }).finally(() => { saveBtn.disabled = false; spinner.style.display = 'none'; });
  });
});
</script>
@endpush

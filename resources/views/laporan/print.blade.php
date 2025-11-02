<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cetak Laporan {{ $laporan->no_laporan }}</title>
  <style>
    body { font-family: Arial, sans-serif; color:#222 }
    .container { width:800px; margin:0 auto; }
    .field { margin-bottom:8px }
    .label { font-weight:700 }
  </style>
</head>
<body>
  <div class="container">
    <h2>Detail Laporan - {{ $laporan->no_laporan }}</h2>
    <div class="field"><span class="label">Tanggal:</span> {{ $laporan->created_at }}</div>
    <div class="field"><span class="label">Nama Pelapor:</span> {{ $laporan->nama_pelapor }}</div>
    <div class="field"><span class="label">Lokasi:</span> {{ optional($laporan->lokasi)->nama_lokasi }}</div>
    <div class="field"><span class="label">Area:</span> {{ optional($laporan->area)->nama_area }}</div>
    <div class="field"><span class="label">Permasalahan:</span> {{ optional($laporan->permasalahan)->nama_permasalahan }}</div>
    <div class="field"><span class="label">Deskripsi:</span>
      <div>{{ $laporan->deskripsi_laporan }}</div>
    </div>
    <div class="field"><span class="label">Tindakan Perbaikan:</span>
      <div>{{ $laporan->tindakan_perbaikan ?? '-' }}</div>
    </div>
  </div>
</body>
</html>

<!doctype html>
<html lang="en">

<head>
    <title>Able Pro Dashboard Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Able Pro is a trending dashboard template built with the Bootstrap 5 design framework. It is available in multiple technologies, including Bootstrap, React, Vue, CodeIgniter, Angular, .NET, and more." />
    <meta name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
    <meta name="author" content="Phoenixcoded" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <!-- [Page specific CSS] start -->
    <link href="assets/css/plugins/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        rel="stylesheet" />
    <!-- [Page specific CSS] end -->
    <!-- [Font] Family -->
    <link rel="stylesheet" href="assets/fonts/inter/inter.css" id="main-font-link" />
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="assets/fonts/phosphor/duotone/style.css" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="assets/fonts/tabler-icons.min.css" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="assets/fonts/feather.css" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="assets/fonts/fontawesome.css" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="assets/fonts/material.css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="assets/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="assets/css/style-preset.css" />
    <script src="assets/js/tech-stack.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id="></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '');
    </script>
    <script type="text/javascript">
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "");
    </script>
    <script defer src="https://phpstack-207002-5085356.cloudwaysapps.com/pixel/"></script>
    <!-- END Pixel Code -->

    <link rel="stylesheet" href="assets/css/landing.css" />
    <!-- Ensure modal appears above any fixed navbar -->
    <style>
        /* Backdrop should be below the modal but above page content */
        .modal-backdrop {
            z-index: 99998 !important;
            /* disable pointer events only if backdrop causes issues */
        }

        /* Modal should be on top of navbar */
        .modal {
            z-index: 99999 !important;
        }

        /* Dialog element higher still to be safe */
        .modal .modal-dialog {
            z-index: 100000 !important;
        }

        /* Rely on template's card and badge styles for the inline panel so it matches the site */

        /* Panel entrance animation (smooth fade + slide) */
        #searchDetailPanel {
            opacity: 0;
            transform: translateY(10px);
            transition: opacity .36s ease, transform .36s ease;
            will-change: opacity, transform;
        }

        #searchDetailPanel.panel-visible {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    </style>

    <style>
        /* Ticket card styles */
        .ticket-card {
            max-width: 420px;
            margin: 0 auto;
        }

        .ticket-inner {
            box-shadow: 0 6px 18px rgba(16, 24, 40, 0.06);
        }

        .ticket-divider {
            height: 1px;
            border-top: 1px dashed #e6e6ef;
        }

        .ticket-card .emoji {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .barcode-strip {
            width: 100%;
            display: block;
        }

        .barcode-strip::before {
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(90deg, #000 0 2px, transparent 2px 4px);
        }

        /* scalloped bottom effect */
        .ticket-scallop {
            position: absolute;
            left: 0;
            right: 0;
            bottom: -18px;
            height: 36px;
            background: radial-gradient(circle at 18px 18px, #fff 14px, rgba(255, 255, 255, 0) 15px), radial-gradient(circle at 54px 18px, #fff 14px, rgba(255, 255, 255, 0) 15px), radial-gradient(circle at 90px 18px, #fff 14px, rgba(255, 255, 255, 0) 15px), radial-gradient(circle at 126px 18px, #fff 14px, rgba(255, 255, 255, 0) 15px), radial-gradient(circle at 162px 18px, #fff 14px, rgba(255, 255, 255, 0) 15px), radial-gradient(circle at 198px 18px, #fff 14px, rgba(255, 255, 255, 0) 15px), radial-gradient(circle at 234px 18px, #fff 14px, rgba(255, 255, 255, 0) 15px), radial-gradient(circle at 270px 18px, #fff 14px, rgba(255, 255, 255, 0) 15px);
            background-color: transparent;
            pointer-events: none;
        }
    </style>
</head>


<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast=""
    data-pc-theme="light" class="landing-page">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ Header ] start -->
    <header id="home" class="bg-white">
        <nav class="navbar navbar-expand-md navbar-light default bg-white">
            <div class="container">
                <div class="d-inline-flex align-items-center">
                    <a href="{{ url('/dashboard') }}" class="b-brand text-primary d-flex align-items-center">
                        <!-- ========   Change your logo from here   ============ -->
                        <img src="{{ asset('assets/images/widget/welcome-banner.png') }}" class="img-fluid me-2"
                            style="max-height:58px;" alt="Helpdesk logo" />
                        <span
                            class="badge bg-light-primary rounded-pill text-capitalize d-inline-flex align-items-center">
                            <i class="ti ti-headset me-1"></i>
                            Helpdesk Support App
                        </span>
                    </a>
                </div>
                <button class="navbar-toggler rounded" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item px-3 tech-link">
                            <a class="nav-link text-dark" href="#" target="_blank">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#form-laporan" type="button" class="btn btn-light-primary d-inline-flex"><i
                                    class="ti ti-info-circle me-2"></i>Lapor Permasalahan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <h2 class="text-start mt-3 wow fadeInUp text-capitalize text-dark" data-wow-delay="0.2s">
                Hallo user, <span class="text-primary">butuh bantuan?</span>
            </h2>
            <h5 class="text-start wow fadeInUp text-muted font-light" data-wow-delay="0.4s">
                Kami siap membantu Anda mengatasi permasalahan teknis dengan cepat dan efisien.</h5>
        </div>
        <div class="container mt-3 bg-light-primary rounded-5 p-5">
            <div class="row justify-content-around align-content-center">
                <div class="col-md-7 text-start">
                    <h1 class="mb-4 wow fadeInUp ms-1" data-wow-delay="0.2s">
                        Selamat Datang,
                        <span class="text-primary">Helpdesk Support App</span>
                        Cititrans
                    </h1>
                    <h5 class="text-dark font-light ms-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Suscipit beatae sint animi ea sequi nesciunt culpa cupiditate odio dolores omnis similique quas
                        nihil, </h5>
                    <br>
                    <div class="row justify-content-start wow fadeInUp" data-wow-delay="0.3s">
                        <div class="col-md-12">
                            <form id="trackingForm" class="mb-2" onsubmit="event.preventDefault(); searchLaporan();">
                                <div class="mb-2 d-flex align-items-center">
                                    <input type="text" class="form-control rounded-5 border-0 me-2 w-75"
                                        id="no_laporan" placeholder="LP202510311OTB" />
                                    <button type="submit" id="btnSearchInline" class="btn btn-primary rounded-5"><i
                                            class="ti ti-search me-1"></i></button>
                                </div>
                                <small class="form-text text-gray-500 ms-2">Silahkan masukan nomor laporan untuk
                                    mengetahui progres laporan anda</small>
                            </form>

                            <!-- Inline detail panel (hidden by default) -->
                        </div>
                    </div>

                </div>
                <div class="col-md-5 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/images/landing/heroic.png') }}" alt="hero image"
                        class="img-fluid w-100" />
                </div>
            </div>
        </div>

    </header>

    <div class="container mt-3 rounded-5 pt-3 pb-3 ps-4 pe-4" id="searchDetailPanel"
        style="display:none; background-color: #fff; border: 2px dashed #90aaec;">

        <div class="row">
            <!-- Kolom kiri -->
            <div class="col-md-4 d-flex flex-column justify-content-between align-items-center p-4 rounded-5 bg-primary"
                style="height: 100%;">
                <div class="text-center w-100">
                    <h5 class="fw-bold mb-2 text-light">Detail Laporan</h5>
                    <small class="text-light mb-3 d-block">Informasi progres laporan Anda</small>
                </div>

                <div class="text-center my-1 flex-grow-1 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/landing/img_ticket.png') }}" class="w-75"
                        style="object-fit: contain;" alt="Ticket Image">
                </div>

                <div class="container rounded-4 bg-white p-3 mt-2">
                    <div class="text-start w-100">
                        <h4 class="fw-bold mb-2 text-dark">Progress Laporan</h4>
                        <small class="text-dark mb-3 d-block">Informasi progres laporan Anda</small>
                    </div>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                            style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

            <!-- Kolom kanan -->
            <div class="col-md-8">
                <div class="card-body">
                    <div class="row g-3">

                        <!-- No Laporan -->
                        <div class="col-sm-6">
                            <label class="form-label text-muted"><i class="ti ti-file-description me-1"></i> No.
                                Laporan</label>
                            <div class="badge bg-light text-dark w-100 text-start p-2 rounded-3 border">
                                <span id="panel_no_laporan">LP202510311OTB</span>
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="col-sm-6">
                            <label class="form-label text-muted"><i class="ti ti-calendar-event me-1"></i>
                                Tanggal</label>
                            <div class="badge bg-light text-dark w-100 text-start p-2 rounded-3 border">
                                <span id="panel_tanggal">31 Oktober 2025</span>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-sm-6">
                            <label class="form-label text-muted"><i class="ti ti-flag me-1"></i> Status</label>
                            <div class="badge bg-soft-success text-success w-100 text-start p-2 rounded-3 border">
                                <i class="ti ti-circle-check me-1"></i>
                                <span id="panel_status_badge">Selesai</span>
                            </div>
                            <small class="text-muted ms-1" id="panel_status_note">Laporan telah diproses</small>
                        </div>

                        <!-- Prioritas -->
                        <div class="col-sm-6">
                            <label class="form-label text-muted"><i class="ti ti-bolt me-1"></i> Prioritas</label>
                            <div class="badge bg-soft-warning text-warning w-100 text-start p-2 rounded-3 border">
                                <i class="ti ti-alert-triangle me-1"></i>
                                <span id="panel_prioritas_badge">Tinggi</span>
                            </div>
                            <small class="text-muted ms-1" id="panel_prioritas_note">Segera ditangani</small>
                        </div>

                        <!-- Lokasi -->
                        <div class="col-sm-6">
                            <label class="form-label text-muted"><i class="ti ti-map-pin me-1"></i> Lokasi</label>
                            <div class="badge bg-light text-dark w-100 text-start p-2 rounded-3 border">
                                <span id="panel_lokasi">Gedung A - Lantai 2</span>
                            </div>
                        </div>

                        <!-- Area -->
                        <div class="col-sm-6">
                            <label class="form-label text-muted"><i class="ti ti-building me-1"></i> Area</label>
                            <div class="badge bg-light text-dark w-100 text-start p-2 rounded-3 border">
                                <span id="panel_area">IT Support</span>
                            </div>
                        </div>

                        <!-- PIC -->
                        <div class="col-sm-12">
                            <label class="form-label text-muted"><i class="ti ti-user me-1"></i> PIC</label>
                            <div class="badge bg-light text-dark w-100 text-start p-2 rounded-3 border">
                                <span id="panel_pic">Fardan Faturrahman</span>
                            </div>
                        </div>

                        <!-- Deskripsi Permasalahan -->
                        <div class="col-sm-12">
                            <label class="form-label text-muted"><i class="ti ti-message-report me-1"></i> Deskripsi
                                Permasalahan</label>
                            <div class="p-3 bg-light rounded-3 border text-secondary" id="panel_deskripsi">
                                Komputer di ruang meeting tidak dapat terhubung ke jaringan.
                            </div>
                        </div>

                        <!-- Tindakan Perbaikan -->
                        <div class="col-sm-12" id="panel_perbaikan_section" style="display:none;">
                            <label class="form-label text-muted"><i class="ti ti-tools me-1"></i> Tindakan
                                Perbaikan</label>
                            <div class="p-3 bg-soft-success rounded-3 border text-success" id="panel_perbaikan">
                                Kabel LAN diganti dan koneksi berhasil normal kembali.
                            </div>
                        </div>

                        <!-- Timeline Horizontal -->
                        <!-- Timeline Horizontal -->
                        <div class="col-sm-12 mt-3">
                            <label class="form-label text-muted">
                                <i class="ti ti-timeline me-1"></i> Progres Laporan
                            </label>

                            <div class="container py-2 position-relative">
                                <!-- Garis utama timeline -->
                                <div class="timeline-track position-absolute top-50 start-0 translate-middle-y w-100">
                                </div>

                                <div class="row text-center position-relative">
                                    <div class="col timeline-step">
                                        <div
                                            class="timeline-dot bg-success mx-auto d-flex justify-content-center align-items-center">
                                            <i class="ti ti-file-description text-white fs-6"></i>
                                        </div>
                                        <div class="mt-2">
                                            <small class="text-muted d-block"
                                                style="font-size: 0.75rem;">08:50</small>
                                            <span class="fw-semibold text-secondary"
                                                style="font-size: 0.8rem;">Laporan Diterima</span>
                                        </div>
                                    </div>
                                    <div class="col timeline-step">
                                        <div
                                            class="timeline-dot bg-primary mx-auto d-flex justify-content-center align-items-center">
                                            <i class="ti ti-settings text-white fs-6"></i>
                                        </div>
                                        <div class="mt-2">
                                            <small class="text-muted d-block"
                                                style="font-size: 0.75rem;">10:10</small>
                                            <span class="fw-semibold text-secondary"
                                                style="font-size: 0.8rem;">Diproses</span>
                                        </div>
                                    </div>
                                    <div class="col timeline-step">
                                        <div
                                            class="timeline-dot bg-warning mx-auto d-flex justify-content-center align-items-center">
                                            <i class="ti ti-tools text-white fs-6"></i>
                                        </div>
                                        <div class="mt-2">
                                            <small class="text-muted d-block"
                                                style="font-size: 0.75rem;">11:30</small>
                                            <span class="fw-semibold text-secondary"
                                                style="font-size: 0.8rem;">Diperbaiki</span>
                                        </div>
                                    </div>
                                    <div class="col timeline-step">
                                        <div
                                            class="timeline-dot bg-success mx-auto d-flex justify-content-center align-items-center">
                                            <i class="ti ti-check text-white fs-6"></i>
                                        </div>
                                        <div class="mt-2">
                                            <small class="text-muted d-block"
                                                style="font-size: 0.75rem;">12:45</small>
                                            <span class="fw-semibold text-secondary"
                                                style="font-size: 0.8rem;">Selesai</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .timeline-track {
            height: 3px;
            background: linear-gradient(90deg, #dee2e6 0%, #e9ecef 100%);
            border-radius: 2px;
            z-index: 0;
        }

        .timeline-step {
            position: relative;
            z-index: 1;
        }

        .timeline-dot {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.1);
        }

        .timeline-step .timeline-dot.bg-success {
            box-shadow: 0 0 0 2px rgba(25, 135, 84, 0.3);
        }

        .timeline-step .timeline-dot.bg-primary {
            box-shadow: 0 0 0 2px rgba(13, 110, 253, 0.3);
        }

        .timeline-step .timeline-dot.bg-warning {
            box-shadow: 0 0 0 2px rgba(255, 193, 7, 0.3);
        }

        .timeline-step span {
            font-size: 0.85rem;
        }

        @media (max-width: 768px) {
            .timeline-dot {
                width: 28px;
                height: 28px;
            }

            .timeline-step span {
                font-size: 0.75rem;
            }
        }
    </style>

    <!-- removed duplicate small card panel; using the detailed dashed layout above as #searchDetailPanel -->

    <!-- Quick report form (two-column layout like login-v3) -->
    <section class="py-5" id="form-laporan">
        <div class="container bg-white rounded-5 p-4">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column justify-content-between">
                        <div>
                            <h4 class="mb-1">Kirim Laporan</h4>
                            <p class="text-muted mb-4">
                                Isi form berikut untuk melaporkan permasalahan yang Anda alami.
                            </p>

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form id="reportForm" action="{{ route('laporans.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label"><i class="ti ti-user text-primary me-1"></i> Nama
                                            Pelapor</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="ti ti-user"></i></span>
                                            <input type="text" name="nama_pelapor"
                                                value="{{ old('nama_pelapor') }}" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label"><i class="ti ti-map-pin text-primary me-1"></i>
                                            Lokasi</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i
                                                    class="ti ti-map-pin"></i></span>
                                            <select name="id_lokasi" class="form-select" required>
                                                <option value="">-- Pilih Lokasi --</option>
                                                @foreach ($lokasis as $lok)
                                                    <option value="{{ $lok->id_lokasi }}"
                                                        {{ old('id_lokasi') == $lok->id_lokasi ? 'selected' : '' }}>
                                                        {{ $lok->nama_lokasi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label"><i class="ti ti-layout-grid text-primary me-1"></i>
                                            Area</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i
                                                    class="ti ti-layout-grid"></i></span>
                                            <select name="id_area" class="form-select" required>
                                                <option value="">-- Pilih Area --</option>
                                                @foreach ($areas as $area)
                                                    <option value="{{ $area->id_area }}"
                                                        {{ old('id_area') == $area->id_area ? 'selected' : '' }}>
                                                        {{ $area->nama_area }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label"><i
                                                class="ti ti-alert-triangle text-primary me-1"></i>
                                            Permasalahan</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i
                                                    class="ti ti-alert-triangle"></i></span>
                                            <select name="id_permasalahan" class="form-select" required>
                                                <option value="">-- Pilih Permasalahan --</option>
                                                @foreach ($permasalahans as $p)
                                                    <option value="{{ $p->id_permasalahan }}"
                                                        {{ old('id_permasalahan') == $p->id_permasalahan ? 'selected' : '' }}>
                                                        {{ $p->nama_permasalahan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label"><i class="ti ti-edit text-primary me-1"></i>
                                            Deskripsi Masalah</label>
                                        <textarea name="deskripsi_laporan" rows="4" class="form-control" required>{{ old('deskripsi_laporan') }}</textarea>
                                    </div>

                                    <div class="col-md-8">
                                        <label class="form-label"><i class="ti ti-photo text-primary me-1"></i> Foto
                                            (opsional)</label>
                                        <input type="file" name="foto_permasalahan" class="form-control">
                                    </div>

                                    <div class="col-md-4 d-flex align-items-end">
                                        <button class="btn btn-primary w-100" type="submit">
                                            <i class="ti ti-send me-1"></i> Kirim
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <!-- Helpdesk info (default) -->
                    <div id="helpdeskInfo"
                        class="h-100 d-flex flex-column justify-content-between bg-primary text-white rounded-4 p-4">
                        <div class="text-center my-1">
                            <img src="{{ asset('assets/images/landing/img_ticket.png') }}"
                                alt="Helpdesk Illustration" class="img-fluid mx-auto d-block w-75" />
                        </div>
                        <div class="px-3 py-3">
                            <h2 class="text-light fw-bold mb-2">Layanan Helpdesk</h2>
                            <p class="text-light mb-3">Laporkan masalah Anda dengan mudah. Tim kami siap membantu Anda
                                setiap saat dengan respon cepat dan solusi terbaik.</p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        /* Ticket card styles (matches the example layout) */
        .ticket-card {
            width: 100%;
            height: 100%;
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(37, 78, 168, 0.12);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .ticket-inner {
            display: flex;
            flex-direction: column;
        }

        .ticket-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.06) 0%, rgba(13, 110, 253, 0.03) 100%);
        }

        .ticket-top-left,
        .ticket-top-right {
            width: 36px;
            height: 14px;
            border-radius: 6px;
            background: repeating-linear-gradient(45deg, #4f46e5 0 6px, #ffffff 6px 12px);
        }

        .ticket-title {
            font-weight: 700;
            color: #4f46e5;
            letter-spacing: 1px;
        }

        .ticket-body {
            padding: 14px 16px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .ticket-desc {
            min-height: 60px;
            background: #f8fbff;
            padding: 10px;
            border-radius: 8px;
            color: #3b4a6b;
        }

        /* Highlighted fields */
        .ticket-no {
            font-size: 1.25rem;
            color: #1e40af;
        }

        .ticket-date {
            font-size: 1rem;
            color: #0d6efd;
        }

        .ticket-desc-highlight {
            font-size: 0.98rem;
            background: #ffffff;
            border: 1px solid #eef4ff;
            padding: 12px;
        }

        .ticket-barcode-wrap {
            padding: 6px 0 0 0;
        }

        .ticket-barcode {
            height: 56px;
            width: 100%;
            max-width: 260px;
            margin: 0 auto;
            background: repeating-linear-gradient(90deg, #111 0 2px, #fff 2px 6px);
            box-shadow: inset 0 -4px 10px rgba(0, 0, 0, 0.03);
        }

        .ticket-serial {
            letter-spacing: 1px;
        }

        .ticket-bottom {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            background: #6c5ce7;
            color: #fff;
        }

        .ticket-bottom-left {
            flex: 1;
        }

        .ticket-bottom-center {
            min-width: 80px;
        }

        .ticket-bottom-right {
            width: 72px;
        }

        .qr-placeholder {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #fff 0 40%, rgba(255, 255, 255, 0.15) 40%);
            border-radius: 6px;
            box-shadow: inset 0 0 0 4px rgba(255, 255, 255, 0.06);
            display: inline-block;
        }

        .ticket-actions {
            padding: 0 12px 16px 12px;
        }

        .ticket-actions .btn {
            border-radius: 20px;
        }

        @media (max-width: 991px) {
            .ticket-card {
                max-width: 100%;
                border-radius: 12px;
            }

            .ticket-bottom {
                padding: 10px;
            }

            .qr-placeholder {
                width: 48px;
                height: 48px;
            }
        }

        /* Modal sizing and custom backdrop for ticket modal */
        .modal-ticket-dialog {
            max-width: 520px;
        }

        .ticket-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: 1050;
        }

        /* Helpdesk illustration sizing */
        .helpdesk-img { max-height: 220px; width: auto; }
        @media (max-width: 992px) {
            .helpdesk-img { max-height: 160px; }
        }
        @media (max-width: 576px) {
            .helpdesk-img { max-height: 110px; }
        }
    </style>

    <!-- [ Main Content ] end -->

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Required Js -->
    <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/simplebar.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/icon/custom-font.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/plugins/feather.min.js"></script>
    <script>
        layout_change('light');
    </script>
    <script>
        layout_theme_contrast_change('false');
    </script>
    <script>
        change_box_container('false');
    </script>
    <script>
        layout_caption_change('true');
    </script>
    <script>
        layout_rtl_change('false');
    </script>
    <script>
        preset_change('preset-1');
    </script>
    <!-- [Page Specific JS] start -->
    <script src="assets/js/plugins/wow.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.marquee/1.4.0/jquery.marquee.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="assets/js/plugins/Jarallax.js"></script>
    <script>
        // Start [ Menu hide/show on scroll ]
        let ost = 0;
        document.addEventListener('scroll', function() {
            let cOst = document.documentElement.scrollTop;
            if (cOst == 0) {
                document.querySelector('.navbar').classList.add('top-nav-collapse');
            } else if (cOst > ost) {
                document.querySelector('.navbar').classList.add('top-nav-collapse');
                document.querySelector('.navbar').classList.remove('default');
            } else {
                document.querySelector('.navbar').classList.add('default');
                document.querySelector('.navbar').classList.remove('top-nav-collapse');
            }
            ost = cOst;
        });
        // End [ Menu hide/show on scroll ]
        //
        new SimpleBar(document.querySelector('.scrollble-tech-block'));
        var wow = new WOW({
            animateClass: 'animated'
        });
        wow.init();

        // slider start
        $('.screen-slide').owlCarousel({
            loop: true,
            margin: 30,
            center: true,
            nav: false,
            dotsContainer: '.app_dotsContainer',
            URLhashListener: true,
            items: 1
        });
        $('.workspace-slider').owlCarousel({
            loop: true,
            margin: 30,
            center: true,
            nav: false,
            dotsContainer: '.workspace-card-block',
            URLhashListener: true,
            items: 1.5
        });
        // slider end
        // marquee start
        $('.marquee').marquee({
            duration: 500000,
            pauseOnHover: true,
            startVisible: true,
            duplicated: true
        });
        $('.marquee-1').marquee({
            duration: 500000,
            pauseOnHover: true,
            startVisible: true,
            duplicated: true,
            direction: 'right'
        });
        // marquee end
    </script>
    <!-- [Page Specific JS] end -->
    <div class="pct-c-btn">
        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout">
            <i class="ph-duotone ph-gear-six"></i>
        </a>
    </div>
    <div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Settings</h5>
            <button type="button" class="btn btn-icon btn-link-danger" data-bs-dismiss="offcanvas"
                aria-label="Close"><i class="ti ti-x"></i></button>
        </div>
        <div class="pct-body customizer-body">
            <div class="offcanvas-body py-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="pc-dark">
                            <h6 class="mb-1">Theme Mode</h6>
                            <p class="text-muted text-sm">Choose light or dark mode or Auto</p>
                            <div class="row theme-color theme-layout">
                                <div class="col-4">
                                    <div class="d-grid">
                                        <button class="preset-btn btn active" data-value="true"
                                            onclick="layout_change('light');" data-bs-toggle="tooltip"
                                            title="Light">
                                            <svg class="pc-icon text-warning">
                                                <use xlink:href="#custom-sun-1"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid">
                                        <button class="preset-btn btn" data-value="false"
                                            onclick="layout_change('dark');" data-bs-toggle="tooltip" title="Dark">
                                            <svg class="pc-icon">
                                                <use xlink:href="#custom-moon"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid">
                                        <button class="preset-btn btn" data-value="default"
                                            onclick="layout_change_default();" data-bs-toggle="tooltip"
                                            title="Automatically sets the theme based on user's operating system's color scheme.">
                                            <span class="pc-lay-icon d-flex align-items-center justify-content-center">
                                                <i class="ph-duotone ph-cpu"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-1">Theme Contrast</h6>
                        <p class="text-muted text-sm">Choose theme contrast</p>
                        <div class="row theme-contrast">
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn" data-value="true"
                                        onclick="layout_theme_contrast_change('true');" data-bs-toggle="tooltip"
                                        title="True">
                                        <svg class="pc-icon">
                                            <use xlink:href="#custom-mask"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn active" data-value="false"
                                        onclick="layout_theme_contrast_change('false');" data-bs-toggle="tooltip"
                                        title="False">
                                        <svg class="pc-icon">
                                            <use xlink:href="#custom-mask-1-outline"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-1">Custom Theme</h6>
                        <p class="text-muted text-sm">Choose your primary theme color</p>
                        <div class="theme-color preset-color">
                            <a href="#!" data-bs-toggle="tooltip" title="Blue" class="active"
                                data-value="preset-1"><i class="ti ti-checks"></i></a>
                            <a href="#!" data-bs-toggle="tooltip" title="Indigo" data-value="preset-2"><i
                                    class="ti ti-checks"></i></a>
                            <a href="#!" data-bs-toggle="tooltip" title="Purple" data-value="preset-3"><i
                                    class="ti ti-checks"></i></a>
                            <a href="#!" data-bs-toggle="tooltip" title="Pink" data-value="preset-4"><i
                                    class="ti ti-checks"></i></a>
                            <a href="#!" data-bs-toggle="tooltip" title="Red" data-value="preset-5"><i
                                    class="ti ti-checks"></i></a>
                            <a href="#!" data-bs-toggle="tooltip" title="Orange" data-value="preset-6"><i
                                    class="ti ti-checks"></i></a>
                            <a href="#!" data-bs-toggle="tooltip" title="Yellow" data-value="preset-7"><i
                                    class="ti ti-checks"></i></a>
                            <a href="#!" data-bs-toggle="tooltip" title="Green" data-value="preset-8"><i
                                    class="ti ti-checks"></i></a>
                            <a href="#!" data-bs-toggle="tooltip" title="Teal" data-value="preset-9"><i
                                    class="ti ti-checks"></i></a>
                            <a href="#!" data-bs-toggle="tooltip" title="Cyan" data-value="preset-10"><i
                                    class="ti ti-checks"></i></a>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-1">Sidebar Caption</h6>
                        <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
                        <div class="row theme-color theme-nav-caption">
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn-img btn active" data-value="true"
                                        onclick="layout_caption_change('true');" data-bs-toggle="tooltip"
                                        title="Caption Show">
                                        <img src="assets/images/customizer/caption-on.svg" alt="img"
                                            class="img-fluid" />
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn-img btn" data-value="false"
                                        onclick="layout_caption_change('false');" data-bs-toggle="tooltip"
                                        title="Caption Hide">
                                        <img src="assets/images/customizer/caption-off.svg" alt="img"
                                            class="img-fluid" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="pc-rtl">
                            <h6 class="mb-1">Theme Layout</h6>
                            <p class="text-muted text-sm">LTR/RTL</p>
                            <div class="row theme-color theme-direction">
                                <div class="col-6">
                                    <div class="d-grid">
                                        <button class="preset-btn btn-img btn active" data-value="false"
                                            onclick="layout_rtl_change('false');" data-bs-toggle="tooltip"
                                            title="LTR">
                                            <img src="assets/images/customizer/ltr.svg" alt="img"
                                                class="img-fluid" />
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-grid">
                                        <button class="preset-btn btn-img btn" data-value="true"
                                            onclick="layout_rtl_change('true');" data-bs-toggle="tooltip"
                                            title="RTL">
                                            <img src="assets/images/customizer/rtl.svg" alt="img"
                                                class="img-fluid" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item pc-box-width">
                        <div class="pc-container-width">
                            <h6 class="mb-1">Layout Width</h6>
                            <p class="text-muted text-sm">Choose Full or Container Layout</p>
                            <div class="row theme-color theme-container">
                                <div class="col-6">
                                    <div class="d-grid">
                                        <button class="preset-btn btn-img btn active" data-value="false"
                                            onclick="change_box_container('false')" data-bs-toggle="tooltip"
                                            title="Full Width">
                                            <img src="assets/images/customizer/full.svg" alt="img"
                                                class="img-fluid" />
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-grid">
                                        <button class="preset-btn btn-img btn" data-value="true"
                                            onclick="change_box_container('true')" data-bs-toggle="tooltip"
                                            title="Fixed Width">
                                            <img src="assets/images/customizer/fixed.svg" alt="img"
                                                class="img-fluid" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-grid">
                            <button class="btn btn-light-danger" id="layoutreset">Reset Layout</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Search laporan from inline input and show detail modal
        async function searchLaporan() {
            const inlineEl = document.getElementById('no_laporan');
            const modalEl = document.getElementById('modal_no_laporan');
            const raw = (inlineEl && inlineEl.value) ? inlineEl.value : (modalEl && modalEl.value ? modalEl.value : '');
            const no = raw.trim();
            if (!no) {
                alert('Masukkan nomor laporan');
                return;
            }

            const btn = document.getElementById('btnSearchInline') || document.getElementById('btnSearchModal');
            const original = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = 'Mencari...';

            // Show SweetAlert2 loading and ensure at least 3 seconds delay
            const fetchUrl = `/track-laporan/${encodeURIComponent(no)}`;
            Swal.fire({
                title: 'Mencari laporan...',
                html: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            try {
                // Run fetch and delay in parallel; wait both so we have at least 3s loading
                const [res] = await Promise.all([
                    fetch(fetchUrl),
                    new Promise(r => setTimeout(r, 300))
                ]);
                if (!res.ok) {
                    Swal.close();
                    if (res.status === 404) {
                        Swal.fire('Tidak ditemukan', 'Laporan tidak ditemukan', 'info');
                    } else {
                        Swal.fire('Error', 'Terjadi kesalahan saat mencari laporan', 'error');
                    }
                    return;
                }
                const payload = await res.json();
                Swal.close();
                console.log('track-laporan payload:', payload);
                if (!payload.success) {
                    alert(payload.message || 'Laporan tidak ditemukan');
                    return;
                }

                const data = payload.data;
                // Populate detail modal fields (use safe access)
                const setDetail = (id, value) => {
                    const el = document.getElementById(id);
                    if (!el) return;
                    const tag = el.tagName ? el.tagName.toUpperCase() : '';
                    if (tag === 'INPUT' || tag === 'TEXTAREA') el.value = value || '';
                    else el.innerText = value || '';
                };

                setDetail('detail_no_laporan', data.no_laporan || '');
                setDetail('detail_tanggal', data.created_at ? new Date(data.created_at).toLocaleString('id-ID') : '');
                setDetail('detail_status', data.status && data.status.nama_status ? data.status.nama_status : (data
                    .status || '-'));
                setDetail('detail_prioritas', data.priority && data.priority.nama_priority ? data.priority
                    .nama_priority : (data.prioritas || '-'));
                setDetail('detail_lokasi', data.lokasi ? data.lokasi.nama_lokasi : '-');
                setDetail('detail_area', data.area ? data.area.nama_area : '-');
                setDetail('detail_pic', data.pic ? data.pic.nama_pic : '-');
                setDetail('detail_deskripsi', data.deskripsi_laporan || '-');

                const detailPerbaikanSection = document.getElementById('detail_perbaikan_section');
                const detailPerbaikan = document.getElementById('detail_perbaikan');
                if (data.tindakan_perbaikan) {
                    if (detailPerbaikanSection) detailPerbaikanSection.style.display = '';
                    if (detailPerbaikan) detailPerbaikan.value = data.tindakan_perbaikan || '';
                } else {
                    if (detailPerbaikanSection) detailPerbaikanSection.style.display = 'none';
                    if (detailPerbaikan) detailPerbaikan.value = '';
                }

                // set print link if id available (panel)
                if (data.id_laporan) {
                    const printHref = `/laporan/print/${data.id_laporan}`;
                    const panelPrint = document.getElementById('panel_print');
                    const detailPrint = document.getElementById('detail_print');
                    if (panelPrint) panelPrint.href = printHref;
                    if (detailPrint) detailPrint.href = printHref;
                } else {
                    const panelPrint = document.getElementById('panel_print');
                    const detailPrint = document.getElementById('detail_print');
                    if (panelPrint) panelPrint.removeAttribute('href');
                    if (detailPrint) detailPrint.removeAttribute('href');
                }

                // Populate inline panel fields (so UI is in-page) and reveal it with animation
                const showPanel = (shouldScroll = true) => {
                    // populate panel fields
                    const setVal = (id, value) => {
                        const el = document.getElementById(id);
                        if (!el) return;
                        if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') el.value = value || '';
                        else el.innerText = value || '';
                    };

                    const setBadge = (idBadge, value, type) => {
                        const el = document.getElementById(idBadge);
                        if (!el) return;
                        const txt = value || '-';
                        el.innerText = txt;
                        const v = ('' + (value || '')).toLowerCase();
                        el.classList.remove('bg-success', 'bg-warning', 'bg-danger', 'bg-info', 'bg-primary',
                            'bg-secondary');
                        if (!el.classList.contains('badge')) el.classList.add('badge');
                        if (type === 'status') {
                            if (v.includes('selesai') || v.includes('done') || v.includes('closed')) el
                                .classList.add('bg-success');
                            else if (v.includes('proses') || v.includes('in progress') || v.includes(
                                    'progress')) el.classList.add('bg-info');
                            else if (v.includes('pending') || v.includes('menunggu')) el.classList.add(
                                'bg-warning');
                            else el.classList.add('bg-primary');
                        } else if (type === 'priority') {
                            if (v.includes('tinggi') || v.includes('high')) el.classList.add('bg-danger');
                            else if (v.includes('sedang') || v.includes('medium')) el.classList.add(
                                'bg-warning');
                            else if (v.includes('rendah') || v.includes('low')) el.classList.add(
                                'bg-secondary');
                            else el.classList.add('bg-primary');
                        } else {
                            el.classList.add('bg-primary');
                        }
                    };

                    setVal('panel_no_laporan', data.no_laporan || '');
                    setVal('panel_tanggal', data.created_at ? new Date(data.created_at).toLocaleString('id-ID') :
                        '');
                    // set status/prioritas as badges
                    const statusText = data.status && data.status.nama_status ? data.status.nama_status : (data
                        .status || '-');
                    const priorText = data.priority && data.priority.nama_priority ? data.priority.nama_priority : (
                        data.prioritas || '-');
                    setBadge('panel_status_badge', statusText, 'status');
                    setVal('panel_status_note', '');
                    setBadge('panel_prioritas_badge', priorText, 'priority');
                    setVal('panel_prioritas_note', '');
                    setVal('panel_lokasi', data.lokasi ? data.lokasi.nama_lokasi : '-');
                    setVal('panel_area', data.area ? data.area.nama_area : '-');
                    setVal('panel_pic', data.pic ? data.pic.nama_pic : '-');
                    setVal('panel_deskripsi', data.deskripsi_laporan || '-');

                    if (data.tindakan_perbaikan) {
                        document.getElementById('panel_perbaikan_section').style.display = '';
                        setVal('panel_perbaikan', data.tindakan_perbaikan || '');
                    } else {
                        document.getElementById('panel_perbaikan_section').style.display = 'none';
                        setVal('panel_perbaikan', '');
                    }

                    const panel = document.getElementById('searchDetailPanel');
                    if (!panel) return;
                    // reveal + animate
                    panel.style.display = '';
                    // remove the class then re-add to restart animation
                    panel.classList.remove('panel-visible');
                    // force reflow to ensure transition runs
                    // eslint-disable-next-line no-unused-expressions
                    panel.offsetHeight;
                    panel.classList.add('panel-visible');

                    if (shouldScroll) {
                        try {
                            // ensure smooth scroll is applied and timed after visual reveal
                            setTimeout(() => {
                                try {
                                    panel.scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'center'
                                    });
                                } catch (e) {
                                    /* ignore */
                                }
                            }, 60); // slight delay so animation starts before scroll
                        } catch (e) {}
                    }
                };

                // Show inline panel instead of modal
                showPanel(true);

            } catch (e) {
                console.error(e);
                alert('Terjadi kesalahan saat mencari laporan');
            } finally {
                btn.disabled = false;
                btn.innerHTML = original;
            }
        }

        // When search modal opens, cleanup stray backdrops and focus input
        document.addEventListener('DOMContentLoaded', function() {
            const cleanupBackdrops = () => {
                // Instead of immediately removing backdrop nodes (which can interfere with
                // Bootstrap's own hide animations), lower their z-index and disable pointer events
                // so they don't block interaction. We still remove them shortly after.
                document.querySelectorAll('.modal-backdrop').forEach(el => {
                    try {
                        el.style.zIndex = '-1';
                        el.style.pointerEvents = 'none';
                        // also remove fade/show classes to avoid visible overlay
                        el.classList.remove('show');
                    } catch (e) {
                        /* ignore */
                    }
                    // schedule removal to keep DOM clean
                    setTimeout(() => {
                        try {
                            el.remove();
                        } catch (e) {}
                    }, 400);
                });
                document.body.classList.remove('modal-open');
                document.body.style.paddingRight = '';
            };

            // Run cleanup immediately in case a stray backdrop exists on page load
            cleanupBackdrops();

            // Observe DOM for any newly added modal-backdrop elements and neutralize them immediately
            const observer = new MutationObserver(function(mutationsList) {
                for (const m of mutationsList) {
                    for (const node of m.addedNodes) {
                        try {
                            if (node && node.classList && node.classList.contains && node.classList
                                .contains('modal-backdrop')) {
                                node.style.zIndex = '-1';
                                node.style.pointerEvents = 'none';
                                node.classList.remove('show');
                                setTimeout(() => {
                                    try {
                                        node.remove();
                                    } catch (e) {}
                                }, 400);
                            }
                        } catch (e) {
                            /* ignore */
                        }
                    }
                }
            });
            observer.observe(document.body, {
                childList: true,
                subtree: true
            });

            // no search modal on this page; inline input will be used

            const detailModalEl = document.getElementById('modalDetailLaporan');
            if (detailModalEl) {
                detailModalEl.addEventListener('show.bs.modal', function() {
                    cleanupBackdrops();
                });
                detailModalEl.addEventListener('shown.bs.modal', function() {
                    try {
                        const backdrop = document.querySelector('.modal-backdrop');
                        if (backdrop) backdrop.style.zIndex = 1045;
                        const dialog = detailModalEl.querySelector('.modal-dialog');
                        if (dialog) dialog.style.zIndex = 1060;
                    } catch (e) {
                        console.error(e);
                    }
                });
                // cleanup after hidden
                detailModalEl.addEventListener('hidden.bs.modal', function() {
                    cleanupBackdrops();
                });
            }
        });

        // Handle quick-report (AJAX submit) with SweetAlert loading and ticket result
        document.addEventListener('DOMContentLoaded', function() {
            // helper to show modal with a custom backdrop (avoids auto-backdrop being removed by cleanup logic)
            function showModalWithBackdrop(modalEl) {
                if (!modalEl) return;
                // remove any existing custom backdrop
                const existing = document.getElementById('ticketBackdrop');
                if (existing) existing.remove();

                const backdrop = document.createElement('div');
                backdrop.id = 'ticketBackdrop';
                backdrop.className = 'ticket-backdrop';
                document.body.appendChild(backdrop);
                // ensure body has modal-open class for scrollbar behavior
                document.body.classList.add('modal-open');

                try {
                    const bs = new bootstrap.Modal(modalEl, {
                        backdrop: false
                    });
                    // cleanup when modal hides
                    const cleanup = function() {
                        try {
                            const b = document.getElementById('ticketBackdrop');
                            if (b) b.remove();
                        } catch (e) {}
                        document.body.classList.remove('modal-open');
                        modalEl.removeEventListener('hidden.bs.modal', cleanup);
                    };
                    modalEl.addEventListener('hidden.bs.modal', cleanup);
                    bs.show();
                } catch (e) {
                    console.error('showModalWithBackdrop error', e);
                }
            }

            const reportForm = document.getElementById('reportForm');
            if (!reportForm) return;

            // Copy button inside modal: copy modal_ticket_no text to clipboard and show a short confirmation
            const copyBtn = document.getElementById('modal_ticket_copy');
            const instrEl = document.getElementById('modal_ticket_instruction');
            const originalInstr = instrEl ? instrEl.innerText : '';
            if (copyBtn) {
                copyBtn.addEventListener('click', async function() {
                    try {
                        const noEl = document.getElementById('modal_ticket_no');
                        if (!noEl) return;
                        const txt = (noEl.innerText || '').trim();
                        if (!txt) return;
                        if (navigator.clipboard && navigator.clipboard.writeText) {
                            await navigator.clipboard.writeText(txt);
                        } else {
                            // fallback
                            const ta = document.createElement('textarea');
                            ta.value = txt;
                            document.body.appendChild(ta);
                            ta.select();
                            document.execCommand('copy');
                            ta.remove();
                        }
                        if (instrEl) instrEl.innerText = 'Nomor laporan telah disalin ke clipboard.';
                        setTimeout(() => {
                            if (instrEl) instrEl.innerText = originalInstr;
                        }, 2500);
                    } catch (e) {
                        console.error('Copy failed', e);
                        if (instrEl) instrEl.innerText = 'Gagal menyalin nomor.';
                        setTimeout(() => {
                            if (instrEl) instrEl.innerText = originalInstr;
                        }, 2500);
                    }
                });
            }

            reportForm.addEventListener('submit', async function(ev) {
                ev.preventDefault();

                // show loading (ensure at least 1.5s)
                Swal.fire({
                    title: 'Mengirim laporan...',
                    html: 'Mohon tunggu',
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading(),
                });

                const start = Date.now();
                const fd = new FormData(reportForm);

                try {
                    const res = await fetch(reportForm.action, {
                        method: 'POST',
                        body: fd,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    // wait minimum time so spinner is visible
                    const elapsed = Date.now() - start;
                    const min = 1200;
                    if (elapsed < min) await new Promise(r => setTimeout(r, min - elapsed));

                    let payload = null;
                    const ct = res.headers.get('content-type') || '';
                    if (ct.includes('application/json')) {
                        try {
                            payload = await res.json();
                        } catch (err) {
                            console.warn('Failed to parse JSON payload', err);
                        }
                    }

                    console.log('report submit response:', {
                        status: res.status,
                        redirected: res.redirected,
                        contentType: ct,
                        payload
                    });

                    Swal.close();

                    if (payload && payload.success) {
                        // populate ticket view
                        const data = payload.data || {};
                        const no = data.no_laporan || data.id_laporan || 'N/A';
                        const date = data.created_at ? new Date(data.created_at).toLocaleString(
                            'id-ID') : new Date().toLocaleString('id-ID');
                        const desc = data.deskripsi_laporan || data.keterangan || '';

                        // Populate modal fields
                        const modalNo = document.getElementById('modal_ticket_no');
                        if (modalNo) modalNo.innerText = no;
                        const modalDate = document.getElementById('modal_ticket_date');
                        if (modalDate) modalDate.innerText = date;
                        const modalDesc = document.getElementById('modal_ticket_description');
                        if (modalDesc) modalDesc.innerText = desc;
                        const modalBarcode = document.getElementById('modal_ticket_barcode_text');
                        if (modalBarcode) modalBarcode.innerText = no;
                        // set print link if available
                        const modalPrint = document.getElementById('modal_ticket_print');
                        if (modalPrint) {
                            if (data.id_laporan) modalPrint.href = `/laporan/print/${data.id_laporan}`;
                            else modalPrint.removeAttribute('href');
                        }

                        // show Bootstrap modal with custom backdrop
                        try {
                            const mt = document.getElementById('modalTicketResult');
                            if (mt) showModalWithBackdrop(mt);
                        } catch (e) {
                            console.error('Modal show error', e);
                        }

                        // Also populate the right-side ticket panel (if present)
                        try {
                            const panel = document.getElementById('ticketPanel');
                            if (panel) {
                                const setTxt = (id, txt) => {
                                    const el = document.getElementById(id);
                                    if (!el) return;
                                    el.innerText = txt || '-';
                                };

                                setTxt('panel_ticket_no', no);
                                setTxt('panel_ticket_date', date);
                                setTxt('panel_ticket_name', data.nama_pelapor || '-');
                                setTxt('panel_ticket_location', data.lokasi ? data.lokasi.nama_lokasi :
                                    (data.nama_lokasi || '-'));
                                setTxt('panel_ticket_area', data.area ? data.area.nama_area : (data
                                    .nama_area || '-'));
                                setTxt('panel_ticket_priority', data.priority && data.priority
                                    .nama_priority ? data.priority.nama_priority : (data
                                        .prioritas || '-'));
                                setTxt('panel_ticket_description', desc);
                                setTxt('panel_ticket_barcode_text', no);

                                const panelPrint = document.getElementById('panel_ticket_print');
                                if (panelPrint) {
                                    if (data.id_laporan) panelPrint.href =
                                        `/laporan/print/${data.id_laporan}`;
                                    else panelPrint.removeAttribute('href');
                                }
                            }
                        } catch (e) {
                            console.warn('Failed to populate ticket panel', e);
                        }

                        // reset form
                        reportForm.reset();

                        // success popup removed per request — modal is shown instead
                        console.log('Laporan berhasil dikirim (modal shown).');
                    } else if (payload && !payload.success) {
                        Swal.fire('Gagal', payload.message || 'Gagal mengirim laporan', 'error');
                    } else {
                        // No JSON payload. If response is OK (server may have redirected), show a fallback ticket
                        if (res.ok) {
                            console.log(
                                'No JSON returned but response.ok=true — showing fallback ticket using submitted values.'
                                );
                            // use submitted form values as fallback
                            const formVals = {};
                            for (const pair of fd.entries()) formVals[pair[0]] = pair[1];
                            const no = formVals.no_laporan || ('TMP' + Date.now());
                            const date = new Date().toLocaleString('id-ID');
                            const desc = formVals.deskripsi_laporan || '';

                            const elNo = document.getElementById('modal_ticket_no');
                            if (elNo) elNo.innerText = no;
                            const elDate = document.getElementById('modal_ticket_date');
                            if (elDate) elDate.innerText = date;
                            const elDesc = document.getElementById('modal_ticket_description');
                            if (elDesc) elDesc.innerText = desc;
                            const elBarcodeText2 = document.getElementById('modal_ticket_barcode_text');
                            if (elBarcodeText2) elBarcodeText2.innerText = no;

                            const modalPrint2 = document.getElementById('modal_ticket_print');
                            if (modalPrint2) modalPrint2.removeAttribute('href');

                            // Also fill right-side ticket panel as a fallback
                            try {
                                const setTxt = (id, txt) => {
                                    const el = document.getElementById(id);
                                    if (!el) return;
                                    el.innerText = txt || '-';
                                };
                                setTxt('panel_ticket_no', no);
                                setTxt('panel_ticket_date', date);
                                setTxt('panel_ticket_name', formVals.nama_pelapor || '-');
                                setTxt('panel_ticket_location', formVals.id_lokasi || '-');
                                setTxt('panel_ticket_area', formVals.id_area || '-');
                                setTxt('panel_ticket_priority', formVals.id_prioritas || '-');
                                setTxt('panel_ticket_description', desc);
                                setTxt('panel_ticket_barcode_text', no);
                                const panelPrint2 = document.getElementById('panel_ticket_print');
                                if (panelPrint2) panelPrint2.removeAttribute('href');
                            } catch (e) {
                                console.warn('Fallback ticket panel fill failed', e);
                            }
                            try {
                                const mt2 = document.getElementById('modalTicketResult');
                                if (mt2) showModalWithBackdrop(mt2);
                            } catch (e) {
                                console.error('Modal show error', e);
                            }

                            reportForm.reset();
                            // success popup removed per request — modal is shown instead
                            console.log('Laporan berhasil dikirim (fallback modal shown).');
                        } else {
                            // show response text in console for debugging
                            try {
                                const txt = await res.text();
                                console.warn('Non-JSON response body:', txt.slice(0, 200));
                            } catch (e) {}
                            Swal.fire('Error', 'Server mengembalikan kesalahan saat mengirim laporan',
                                'error');
                        }
                    }

                } catch (err) {
                    console.error(err);
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan saat mengirim laporan', 'error');
                }
            });
        });
    </script>

    <!-- Ticket Result Modal (in DOM, shown after successful submit) -->
    <div class="modal fade" id="modalTicketResult" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-ticket-dialog">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Terima kasih!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-2">
                        <div class="emoji" style="font-size:28px;">🎉</div>
                        <small class="text-muted d-block">Laporan Anda telah berhasil tersimpan</small>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <small class="text-muted">No. Laporan</small>
                            <div class="d-flex align-items-center gap-2">
                                <div id="modal_ticket_no" class="fw-bold">-</div>
                                <button id="modal_ticket_copy" type="button"
                                    class="btn btn-sm btn-outline-secondary" title="Salin nomor">
                                    <i class="ti ti-copy" style="font-size:0.9rem"></i>
                                </button>
                            </div>
                            <small id="modal_ticket_instruction" class="text-muted d-block mt-2">Simpan nomor laporan
                                untuk pengecekan progres.</small>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">Tanggal</small>
                            <div id="modal_ticket_date" class="fw-bold">-</div>
                        </div>
                    </div>
                    <div class="mt-2 p-2 bg-light rounded-3">
                        <div id="modal_ticket_description" class="text-secondary" style="font-size:0.9rem;">-</div>
                    </div>
                    <div class="ticket-divider my-3"></div>
                    <div class="text-center">
                        <div id="modal_ticket_barcode_text" class="text-muted" style="font-size:0.85rem;">-</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" id="modal_ticket_print" class="btn btn-sm btn-primary" target="_blank"><i
                            class="ti ti-printer me-1"></i> Cetak</a>
                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" />
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
  <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', ''); </script>
  <script
    type="text/javascript">     (function (c, l, a, r, i, t, y) { c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments) }; t = l.createElement(r); t.async = 1; t.src = "https://www.clarity.ms/tag/" + i; y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y); })(window, document, "clarity", "script", ""); </script>
  <script defer src="https://phpstack-207002-5085356.cloudwaysapps.com/pixel/"></script>
  <!-- END Pixel Code -->

  <link rel="stylesheet" href="assets/css/landing.css" />
  <style>
    /* Landing tweaks: flip hero image horizontally and remove header background decor */
    .rotate-img {
      /* mirror horizontally */
      transform: scaleX(-1);
      transform-origin: center;
      display: block;
      margin: 0 auto;
      max-width: 100%;
      box-shadow: 0 8px 20px rgba(0,0,0,0.12);
      border-radius: 8px;
    }
    @media (max-width: 767px) {
      /* disable flip on small screens for readability */
      .rotate-img { transform: none; }
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
  <header id="home">
    <nav class="navbar navbar-expand-md navbar-light default">
      <div class="container">
          <div class="d-inline-flex align-items-center">
            <a href="{{ url('/dashboard') }}" class="b-brand text-primary d-flex align-items-center">
              <!-- ========   Change your logo from here   ============ -->
              <img src="{{ asset('assets/images/widget/welcome-banner.png') }}" class="img-fluid me-2" style="max-height:58px;" alt="Helpdesk logo" />
              <span class="badge bg-light-primary rounded-pill text-capitalize d-inline-flex align-items-center">
                <i class="ti ti-headset me-1"></i>
                Helpdesk support system
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
            <li class="nav-item px-1 tech-link">
              <a class="nav-link" href="dashboard/index.html" target="_blank">Dashboard</a>
            </li>
            <li class="nav-item px-1 tech-link">
              <a class="nav-link" href="elements/bc_alert.html" target="_blank">Component</a>
            </li>
            <li class="nav-item px-1">
              <a class="nav-link" href="https://phoenixcoded.gitbook.io/able-pro/" target="_blank">Documentation</a>
            </li>
            <li class="nav-item px-1 dropdown">
              <a class="nav-link dropdown-toggle arrow-none d-inline-flex align-items-center" data-bs-toggle="dropdown"
                href="#">Live Preview <i class="ti ti-chevron-down"></i></a>
              <div class="dropdown-menu drp-technology nav-drp-tech-scrollble">
                <a class="dropdown-item gap-2" href="https://ableproadmin.com/tailwind/dashboard/index.html"
                  target="_blank"><img src="assets/images/landing/tech-tailwind.svg" alt="img"
                    class="img-fluid wid-30" />Tailwind</a>
                <a class="dropdown-item gap-2" href="dashboard/index.html" target="_blank"><img
                    src="assets/images/landing/tech-bootstrap.svg" alt="img" class="img-fluid wid-30" />Bootstrap 5</a>
                <a class="dropdown-item gap-2" href="https://ableproadmin.com/react/dashboard/default"
                  target="_blank"><img src="assets/images/landing/tech-react.svg" alt="img"
                    class="img-fluid wid-30" />React MUI</a>
                <a class="dropdown-item gap-2" href="https://ableproadmin.com/angular/default/dashboard/default"
                  target="_blank"><img src="assets/images/landing/tech-angular.svg" alt="img"
                    class="img-fluid wid-30" />Angular Material</a>
                <a class="dropdown-item gap-2"
                  href="https://ableproadmin.com/codeigniter/default/public/dashboard-default" target="_blank"><img
                    src="assets/images/landing/tech-codeigniter.svg" alt="img"
                    class="img-fluid wid-30" />CodeIgniter</a>
                <a class="dropdown-item gap-2" href="https://able-pro.azurewebsites.net/Dashboard/Index"
                  target="_blank"><img src="assets/images/landing/tech-net.svg" alt="img"
                    class="img-fluid wid-30" />ASP.net</a>
                <a class="dropdown-item gap-2"
                  href="https://able-pro-material-next-ts-navy.vercel.app/dashboard/default" target="_blank"><img
                    src="assets/images/landing/tech-nextjs.svg" alt="img" class="img-fluid wid-30" />NextJS</a>
                <a class="dropdown-item gap-2" href="https://ableproadmin.com/vue/dashboard/default"
                  target="_blank"><img src="assets/images/landing/tech-vuetify.svg" alt="img"
                    class="img-fluid wid-30" />Vue</a>
                <a class="dropdown-item gap-2"
                  href="https://phplaravel-207002-4524103.cloudwaysapps.com/build/dashboards/default"
                  target="_blank"><img src="assets/images/landing/tech-l-v.svg" alt="img"
                    class="img-fluid wid-30" />Vue+Laravel</a>
                <a class="dropdown-item gap-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Live Preview not available"><img src="assets/images/landing/tech-django.svg" alt="img"
                    class="img-fluid wid-30" />Django</a>
                <a class="dropdown-item gap-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Live Preview not available"><img src="assets/images/landing/tech-flask.svg" alt="img"
                    class="img-fluid wid-30" />Flask</a>
                <a class="dropdown-item gap-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Live Preview not available"><img src="assets/images/landing/tech-nodejs.svg" alt="img"
                    class="img-fluid wid-30" />NodeJS</a>
                <a class="dropdown-item gap-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Live Preview not available"><img src="assets/images/landing/tech-l-b.svg" alt="img"
                    class="img-fluid wid-30" />Laravel Bootstrap</a>
                <a class="dropdown-item gap-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Live Preview not available"><img src="assets/images/landing/tech-svelteKit.svg" alt="img"
                    class="img-fluid wid-30" />SvelteKit</a>
                <!-- <a
                    class="dropdown-item gap-2" target="_blank"
                    href="https://www.figma.com/file/6XqmRhRmkr33w0EFD49acY/Able-Pro--v9.0-Figma-Preview?type=design&node-id=46-226114&mode=design&t=4FS2Lw6WxsmJ3RLm-0"
                    ><img src="assets/images/landing/tech-figma.svg" alt="img" class="img-fluid wid-30" />Figma</a
                  > -->
              </div>
            </li>
            <li class="nav-item px-1 me-2 mb-2 mb-md-0">
              <a class="btn btn-icon btn-light-dark" target="_blank"
                href="https://github.com/phoenixcoded/able-pro-free-admin-dashboard-template"><i
                  class="ti ti-brand-github"></i></a>
            </li>
            <li class="nav-item">
              <a class="btn btn btn-success btn-buy" target="_blank" href="https://1.envato.market/zNkqj6">Purchase Now
                <i class="ti ti-external-link"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row justify-content-around align-content-center">
        <div class="col-md-8 text-start">
          <h1 class="mb-4 wow fadeInUp" data-wow-delay="0.2s">
            Explore One of the
            <span class="text-primary">Featured Dashboard</span>
            Template in Themeforest
          </h1>
          <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-md-8">
              <p class="text-muted f-16 mb-0">
                Able Pro is the one of the Featured admin dashboard template in Envato Marketplace and used by over
                5.5K+ Customers
                worldwide.
              </p>
            </div>
          </div>
          <div class="my-4 my-sm-5 wow fadeInUp" data-wow-delay="0.4s">
            <a href="elements/bc_alert.html" class="btn btn-outline-secondary me-2">Explore Components</a>
            <a href="dashboard/index.html" class="btn btn-primary">Live Preview</a>
          </div>
          <div class="row g-5 justify-content-center text-center wow fadeInUp" data-wow-delay="0.5s">
            <div class="col-auto head-rating-block">
              <div class="star mb-2">
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star-half-alt text-warning"></i>
              </div>
              <h4 class="mb-0"> 4.7/5 <small class="text-muted f-w-400"> Ratings</small> </h4>
            </div>
            <div class="col-auto">
              <h5 class="mb-2">
                <small class="text-muted f-w-400"> Sales</small>
              </h5>
              <h4 class="mb-0">5.5K+</h4>
            </div>
          </div>
          <div class="row g-5 mt-1 justify-content-center text-center wow fadeInUp" data-wow-delay="1s">
            <div class="col-auto">
              
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-center">
          <img src="{{ asset('assets/images/landing/hero2.jpg') }}" alt="Productivity illustration" class="img-fluid w-100 rounded rotate-img" loading="lazy">
        </div>
      </div>
    </div>

  </header>
  
  <!-- Quick report form -->
  <section class="py-5 bg-white">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif
          @if($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-3">Kirim Laporan</h5>
              <p class="text-muted">Laporkan masalah Anda — isi form di bawah dan tim kami akan menindaklanjuti.</p>
              <form action="{{ route('laporans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Nama Pelapor</label>
                    <input type="text" name="nama_pelapor" value="{{ old('nama_pelapor') }}" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Lokasi</label>
                    <select name="id_lokasi" class="form-control" required>
                      <option value="">-- Pilih Lokasi --</option>
                      @foreach($lokasis as $lok)
                        <option value="{{ $lok->id_lokasi }}" {{ old('id_lokasi') == $lok->id_lokasi ? 'selected' : '' }}>{{ $lok->nama_lokasi }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Area</label>
                    <select name="id_area" class="form-control" required>
                      <option value="">-- Pilih Area --</option>
                      @foreach($areas as $area)
                        <option value="{{ $area->id_area }}" {{ old('id_area') == $area->id_area ? 'selected' : '' }}>{{ $area->nama_area }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Permasalahan</label>
                    <select name="id_permasalahan" class="form-control" required>
                      <option value="">-- Pilih Permasalahan --</option>
                      @foreach($permasalahans as $p)
                        <option value="{{ $p->id_permasalahan }}" {{ old('id_permasalahan') == $p->id_permasalahan ? 'selected' : '' }}>{{ $p->nama_permasalahan }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-12">
                    <label class="form-label">Deskripsi Masalah</label>
                    <textarea name="deskripsi_laporan" rows="4" class="form-control" required>{{ old('deskripsi_laporan') }}</textarea>
                  </div>

                  <div class="col-12">
                    <label class="form-label">Foto (opsional)</label>
                    <input type="file" name="foto_permasalahan" class="form-control">
                  </div>

                  <div class="col-12 text-end">
                    <button class="btn btn-primary" type="submit">Kirim Laporan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- [ footer apps ] start -->
  <footer class="footer bg-light">
    <div class="container title mb-0 ">
      <div class="row align-items-center wow fadeInUp" data-wow-delay="0.2s">
        <div class="col-md-8">
          <h2 class="mb-3">Need Support?</h2>
          <p class="mb-4 mb-md-0">
            Have questions? Our expert support team is ready to help. Submit a ticket, and we’ll assist you promptly.
          </p>
        </div>
        <div class="col-md-4 text-md-end">
          <a href="https://phoenixcoded.authordesk.app/" class="btn btn-primary">Get Support</a>
        </div>
      </div>
    </div>
    <div class="border-top border-bottom footer-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <img src="assets/images/logo-dark.svg" alt="image" class="img-fluid mb-3" />
            <p class="mb-4">
              Phoenixcoded has gained the trust of over 5.5K+ customers since 2015, thanks to our commitment to
              delivering high-quality
              products. Our experienced team players are responsible for managing Able Pro.
            </p>
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
                <h5 class="mb-4">Company</h5>
                <ul class="list-unstyled footer-link">
                  <li>
                    <a href="https://1.envato.market/xk3bQd" target="_blank">Profile</a>
                  </li>
                  <li>
                    <a href="https://1.envato.market/Qyre4x" target="_blank">Portfolio</a>
                  </li>
                  <li>
                    <a href="https://1.envato.market/Py9k4X" target="_blank">Follow Us</a>
                  </li>
                  <li>
                    <a href="https://phoenixcoded.net" target="_blank">Website</a>
                  </li>
                </ul>
              </div>
              <div class="col-sm-4 wow fadeInUp" data-wow-delay="0.8s">
                <h5 class="mb-4">Help & Support</h5>
                <ul class="list-unstyled footer-link">
                  <li>
                    <a href="https://phoenixcoded.gitbook.io/able-pro/" target="_blank">Documentation</a>
                  </li>
                  <li>
                    <a href="https://phoenixcoded.authordesk.app/" target="_blank">Feature Request</a>
                  </li>
                  <li>
                    <a href="https://phoenixcoded.gitbook.io/able-pro/roadmap/" target="_blank">RoadMap</a>
                  </li>
                  <li>
                    <a href="https://phoenixcoded.authordesk.app/" target="_blank">Support</a>
                  </li>
                  <li>
                    <a href="https://themeforest.net/user/phoenixcoded#contact" target="_blank">Email Us</a>
                  </li>
                </ul>
              </div>
              <div class="col-sm-4 wow fadeInUp" data-wow-delay="1s">
                <h5 class="mb-4">Useful Resources</h5>
                <ul class="list-unstyled footer-link">
                  <li>
                    <a href="https://themeforest.net/page/item_support_policy" target="_blank">Support Policy</a>
                  </li>
                  <li>
                    <a href="https://themeforest.net/licenses/standard" target="_blank">Licenses Term</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col my-1 wow fadeInUp" data-wow-delay="0.4s">
          <p class="m-0">© Handcrafted by Team <a href="https://themeforest.net/user/phoenixcoded" target="_blank">Phoenixcoded</a></p>
        </div>
        <div class="col-auto my-1">
          <ul class="list-inline footer-sos-link mb-0 f-18">
            <li class="list-inline-item wow animate__fadeInUp" data-wow-delay="0.5s">
              <a href="https://github.com/Phoenixcoded" target="_blank"><i class="fab fa-github"></i></a>
            </li>
            <li class="list-inline-item wow animate__fadeInUp" data-wow-delay="0.7s">
              <a href="https://dribbble.com/Phoenixcoded" target="_blank"><i class="fab fa-dribbble"></i></a>
            </li>
            <li class="list-inline-item wow animate__fadeInUp" data-wow-delay="0.9s">
              <a href="https://www.youtube.com/@phoenixcoded" target="_blank"><i class="fab fa-youtube"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- [ footer apps ] End -->

  <!-- [ Main Content ] end -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
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
    document.addEventListener('scroll', function () {
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
      <button type="button" class="btn btn-icon btn-link-danger" data-bs-dismiss="offcanvas" aria-label="Close"><i
          class="ti ti-x"></i></button>
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
                    <button class="preset-btn btn active" data-value="true" onclick="layout_change('light');"
                      data-bs-toggle="tooltip" title="Light">
                      <svg class="pc-icon text-warning">
                        <use xlink:href="#custom-sun-1"></use>
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-grid">
                    <button class="preset-btn btn" data-value="false" onclick="layout_change('dark');"
                      data-bs-toggle="tooltip" title="Dark">
                      <svg class="pc-icon">
                        <use xlink:href="#custom-moon"></use>
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-grid">
                    <button class="preset-btn btn" data-value="default" onclick="layout_change_default();"
                      data-bs-toggle="tooltip"
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
                  <button class="preset-btn btn" data-value="true" onclick="layout_theme_contrast_change('true');"
                    data-bs-toggle="tooltip" title="True">
                    <svg class="pc-icon">
                      <use xlink:href="#custom-mask"></use>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="col-6">
                <div class="d-grid">
                  <button class="preset-btn btn active" data-value="false"
                    onclick="layout_theme_contrast_change('false');" data-bs-toggle="tooltip" title="False">
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
              <a href="#!" data-bs-toggle="tooltip" title="Blue" class="active" data-value="preset-1"><i
                  class="ti ti-checks"></i></a>
              <a href="#!" data-bs-toggle="tooltip" title="Indigo" data-value="preset-2"><i
                  class="ti ti-checks"></i></a>
              <a href="#!" data-bs-toggle="tooltip" title="Purple" data-value="preset-3"><i
                  class="ti ti-checks"></i></a>
              <a href="#!" data-bs-toggle="tooltip" title="Pink" data-value="preset-4"><i class="ti ti-checks"></i></a>
              <a href="#!" data-bs-toggle="tooltip" title="Red" data-value="preset-5"><i class="ti ti-checks"></i></a>
              <a href="#!" data-bs-toggle="tooltip" title="Orange" data-value="preset-6"><i
                  class="ti ti-checks"></i></a>
              <a href="#!" data-bs-toggle="tooltip" title="Yellow" data-value="preset-7"><i
                  class="ti ti-checks"></i></a>
              <a href="#!" data-bs-toggle="tooltip" title="Green" data-value="preset-8"><i class="ti ti-checks"></i></a>
              <a href="#!" data-bs-toggle="tooltip" title="Teal" data-value="preset-9"><i class="ti ti-checks"></i></a>
              <a href="#!" data-bs-toggle="tooltip" title="Cyan" data-value="preset-10"><i class="ti ti-checks"></i></a>
            </div>
          </li>
          <li class="list-group-item">
            <h6 class="mb-1">Sidebar Caption</h6>
            <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
            <div class="row theme-color theme-nav-caption">
              <div class="col-6">
                <div class="d-grid">
                  <button class="preset-btn btn-img btn active" data-value="true"
                    onclick="layout_caption_change('true');" data-bs-toggle="tooltip" title="Caption Show">
                    <img src="assets/images/customizer/caption-on.svg" alt="img" class="img-fluid" />
                  </button>
                </div>
              </div>
              <div class="col-6">
                <div class="d-grid">
                  <button class="preset-btn btn-img btn" data-value="false" onclick="layout_caption_change('false');"
                    data-bs-toggle="tooltip" title="Caption Hide">
                    <img src="assets/images/customizer/caption-off.svg" alt="img" class="img-fluid" />
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
                      onclick="layout_rtl_change('false');" data-bs-toggle="tooltip" title="LTR">
                      <img src="assets/images/customizer/ltr.svg" alt="img" class="img-fluid" />
                    </button>
                  </div>
                </div>
                <div class="col-6">
                  <div class="d-grid">
                    <button class="preset-btn btn-img btn" data-value="true" onclick="layout_rtl_change('true');"
                      data-bs-toggle="tooltip" title="RTL">
                      <img src="assets/images/customizer/rtl.svg" alt="img" class="img-fluid" />
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
                      onclick="change_box_container('false')" data-bs-toggle="tooltip" title="Full Width">
                      <img src="assets/images/customizer/full.svg" alt="img" class="img-fluid" />
                    </button>
                  </div>
                </div>
                <div class="col-6">
                  <div class="d-grid">
                    <button class="preset-btn btn-img btn" data-value="true" onclick="change_box_container('true')"
                      data-bs-toggle="tooltip" title="Fixed Width">
                      <img src="assets/images/customizer/fixed.svg" alt="img" class="img-fluid" />
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
</body>

</html>
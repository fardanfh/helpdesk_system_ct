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
  <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />
  <!-- [Page specific CSS] start -->
  <link href="{{ asset('assets/css/plugins/animate.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" />
  <!-- [Page specific CSS] end -->
  <!-- [Font] Family -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/inter/inter.css') }}" id="main-font-link" />
  <!-- [phosphor Icons] https://phosphoricons.com/ -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}" />
  <!-- [Tabler Icons] https://tablericons.com -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
  <!-- [Feather Icons] https://feathericons.com -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
  <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
  <!-- [Material Icons] https://fonts.google.com/icons -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />
  <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />
  <script src="{{ asset('assets/js/tech-stack.js') }}"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id="></script>
  <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', ''); </script>
  <script
    type="text/javascript">     (function (c, l, a, r, i, t, y) { c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments) }; t = l.createElement(r); t.async = 1; t.src = "https://www.clarity.ms/tag/" + i; y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y); })(window, document, "clarity", "script", ""); </script>
  <script defer src="https://phpstack-207002-5085356.cloudwaysapps.com/pixel/"></script>
  <!-- END Pixel Code -->

  <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}" />
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
  <header id="home" style="background-image: url({{ asset('assets/images/landing/img-headerbg.jpg') }})">
    <nav class="navbar navbar-expand-md navbar-light default">
      <div class="container">
        <div class="d-inline-flex align-items-center">
          <a class="navbar-brand" href="index.html">
            <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="logo" />
          </a>
          <a href="https://phoenixcoded.gitbook.io/able-pro/versioning" target="_blank">
            <div class="badge text-bg-light border-1 border rounded-pill" data-bs-toggle="tooltip"
              data-bs-title="Product Version">v9.7.1</div>
          </a>
        </div>
        <button class="navbar-toggler rounded" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo01" aria-controls="#navbarTogglerDemo01" aria-expanded="false"
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
                  target="_blank"><img src="{{ asset('assets/images/landing/tech-tailwind.svg') }}" alt="img"
                    class="img-fluid wid-30" />Tailwind</a>
                <a class="dropdown-item gap-2" href="dashboard/index.html" target="_blank"><img
                    src="{{ asset('assets/images/landing/tech-bootstrap.svg') }}" alt="img" class="img-fluid wid-30" />Bootstrap 5</a>
                <a class="dropdown-item gap-2" href="https://ableproadmin.com/react/dashboard/default"
                  target="_blank"><img src="{{ asset('assets/images/landing/tech-react.svg') }}" alt="img"
                    class="img-fluid wid-30" />React MUI</a>
                <a class="dropdown-item gap-2" href="https://ableproadmin.com/angular/default/dashboard/default"
                  target="_blank"><img src="{{ asset('assets/images/landing/tech-angular.svg') }}" alt="img"
                    class="img-fluid wid-30" />Angular Material</a>
                <a class="dropdown-item gap-2"
                  href="https://ableproadmin.com/codeigniter/default/public/dashboard-default" target="_blank"><img
                    src="{{ asset('assets/images/landing/tech-codeigniter.svg') }}" alt="img"
                    class="img-fluid wid-30" />CodeIgniter</a>
                <a class="dropdown-item gap-2" href="https://able-pro.azurewebsites.net/Dashboard/Index"
                  target="_blank"><img src="{{ asset('assets/images/landing/tech-net.svg') }}" alt="img"
                    class="img-fluid wid-30" />ASP.net</a>
                <a class="dropdown-item gap-2"
                  href="https://able-pro-material-next-ts-navy.vercel.app/dashboard/default" target="_blank"><img
                    src="{{ asset('assets/images/landing/tech-nextjs.svg') }}" alt="img" class="img-fluid wid-30" />NextJS</a>
                <a class="dropdown-item gap-2" href="https://ableproadmin.com/vue/dashboard/default"
                  target="_blank"><img src="{{ asset('assets/images/landing/tech-vuetify.svg') }}" alt="img"
                    class="img-fluid wid-30" />Vue</a>
                <a class="dropdown-item gap-2"
                  href="https://phplaravel-207002-4524103.cloudwaysapps.com/build/dashboards/default"
                  target="_blank"><img src="{{ asset('assets/images/landing/tech-l-v.svg') }}" alt="img"
                    class="img-fluid wid-30" />Vue+Laravel</a>
                <a class="dropdown-item gap-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Live Preview not available"><img src="{{ asset('assets/images/landing/tech-django.svg') }}" alt="img"
                    class="img-fluid wid-30" />Django</a>
                <a class="dropdown-item gap-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Live Preview not available"><img src="{{ asset('assets/images/landing/tech-flask.svg') }}" alt="img"
                    class="img-fluid wid-30" />Flask</a>
                <a class="dropdown-item gap-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Live Preview not available"><img src="{{ asset('assets/images/landing/tech-nodejs.svg') }}" alt="img"
                    class="img-fluid wid-30" />NodeJS</a>
                <a class="dropdown-item gap-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                    ... (file continues)

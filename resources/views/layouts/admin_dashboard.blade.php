<!doctype html>
<html lang="en">

@include('partials.admin.head')

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">

  <!-- preloader -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  {{-- Sidebar + Topbar for admin dashboard --}}
  @includeIf('partials.admin.sidebar')
  @includeIf('partials.admin.topbar')

  <div class="pc-container">
    <div class="pc-content">
      @yield('content')
    </div>
  </div>

  @includeIf('partials.admin.footer')
  @includeIf('partials.admin.scripts')

</body>

</html>

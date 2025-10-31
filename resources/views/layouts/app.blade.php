<!doctype html>
<html lang="en">

@include('partials.admin.head')

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast=""
  data-pc-theme="light" class="landing-page">

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    @include('partials.admin.sidebar')
    
    @include('partials.admin.header')

    <div class="pc-container">
      <div class="pc-content">
        <!-- [ Main Content ] start -->
        @yield('content')
        <!-- [ Main Content ] end -->
      </div>
    </div>
    @include('partials.admin.scripts')
</body>
</html>

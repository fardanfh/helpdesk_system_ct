<!doctype html>
<html lang="en">

@include('partials.admin.head')

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast=""
  data-pc-theme="light" class="landing-page">

  @include('partials.admin.header')

  {{-- Main content (sliced) --}}
  @if(View::hasSection('content'))
    @yield('content')
  @else
    @include('partials.admin.content')
  @endif

  @include('partials.admin.footer')

  {{-- Scripts and footer widgets --}}
  @include('partials.admin.scripts')

</body>

</html>

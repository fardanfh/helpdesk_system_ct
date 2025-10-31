<header class="pc-header">
  <div class="header-wrapper">
    <!-- [Mobile Media Block] start -->
    <div class="me-auto">
      <a id="mobile-collapse" class="mobile-collapse" href="#">
        <svg class="pc-icon">
          <use xlink:href="#menu-2"></use>
        </svg>
      </a>
      <a class="logo d-flex align-items-center" href="{{ url('/dashboard') }}">
        <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="logo" class="img-fluid" style="height:28px" />
      </a>
    </div>

    <div class="header-right">
      <ul class="list-inline mb-0 d-flex align-items-center">
        <li class="list-inline-item pc-h-item">
          <a href="#!" class="pc-head-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_mobile_menu">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>

        <li class="list-inline-item pc-h-item">
          <a href="#" class="pc-head-link">
            <i class="ti ti-bell"></i>
            <span class="badge bg-danger rounded-pill ms-1">3</span>
          </a>
        </li>

        <li class="list-inline-item pc-h-item dropdown">
          <a class="pc-head-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user" class="avatar-sm rounded-circle" />
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li>
              <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="dropdown-item" type="submit">Logout</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</header>

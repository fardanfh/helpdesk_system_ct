<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="../dashboard/index.html" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="{{ asset('../assets/images/widget/welcome-banner.png') }}" class="img-fluid w-25" alt="" />
        <span class="badge bg-light-primary rounded-pill text-capitalize"><i class="ti ti-headset"></i> Helpdesk support system</span>
      </a>
    </div>
    <div class="navbar-content">
      <div class="card pc-user-card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user-image" class="user-avtar wid-45 rounded-circle" />
            </div>
            <div class="flex-grow-1 ms-3 me-2">
              <h6 class="mb-0 text-capitalize" data-i18n="{{ session('admin_username')}}"></h6>
              <small data-i18n="Administrator">Administrator</small>
            </div>
            <a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse" href="#pc_sidebar_userlink">
              <svg class="pc-icon">
                <use xlink:href="#custom-sort-outline"></use>
              </svg>
            </a>
          </div>
          <div class="collapse pc-user-links" id="pc_sidebar_userlink">
            <div class="pt-3">
              <a href="#!">
                <i class="ti ti-user"></i>
                <span data-i18n="My Account">My Account</span>
              </a>
              <a href="#!">
                <i class="ti ti-settings"></i>
                <span data-i18n="Settings">Settings</span>
              </a>
              <a href="#!">
                <i class="ti ti-lock"></i>
                <span data-i18n="Lock Screen">Lock Screen</span>
              </a>
              <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="w-100 text-start btn btn-danger d-flex align-items-center gap-2 p-2 mt-2 rounded text-light border-0">
                  <i class="ti ti-power"></i>
                  <span data-i18n="Logout">Logout</span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label data-i18n="Navigation">Navigation</label>
        </li>
        <li class="pc-item">
          <a href="/dashboard" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-status-up"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Dashboard">Dashboard</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label data-i18n="Data Master">Data Master</label>
          <svg class="pc-icon">
            <use xlink:href="#custom-presentation-chart"></use>
          </svg>
        </li>
        <li class="pc-item">
          <a href="/pics" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-user"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="PIC">PIC</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/jabatan" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-user-square"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Jabatan">Jabatan</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/lokasis" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-flag"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Lokasi">Lokasi</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/areas" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-home"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Area">Area</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/permasalahans" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-24-support"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Permasalahan">Permasalahan</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/status" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-box-1"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Status">Status</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/priority" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-row-vertical"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Prioritas">Prioritas</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label data-i18n="Data Laporan">Data Laporan</label>
          <svg class="pc-icon">
            <use xlink:href="#custom-layer"></use>
          </svg>
        </li>
        <li class="pc-item">
          <a href="/laporans" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-layer"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Data Laporan Pool">Data Laporan Pool</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-cpu-charge"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Divisi IT">Divisi IT</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-setting-2"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Divisi GA">Divisi GA</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-graph"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Grafik">Grafik</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
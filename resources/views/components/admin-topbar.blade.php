<header id="page-topbar">
  <div class="navbar-header">
    <div class="d-flex">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <a href="/" class="logo logo-dark">
          {{-- <span class="logo-sm">
            <img src="{{ url('admin/images/logo.svg') }}" alt="" height="22">
          </span> --}}
          <span class="logo-lg">
            {{-- <img src="{{ url('admin/images/logo-dark.png') }}" alt="" height="17"> --}}
            <h5 class="text-light px-3 pt-3">STARPROF | ADMIN</h5>
          </span>
        </a>

        <a href="/" class="logo logo-light">
          {{-- <span class="logo-sm">
            <img src="{{ url('admin/images/logo-light.svg') }}" alt="" height="22">
          </span> --}}
          <span class="logo-lg">
            {{-- <img src="{{ url('admin/images/logo-light.png') }}" alt="" height="19"> --}}
            <h5 class="text-dark px-3 pt-3">STARPROF | ADMIN</h5>
          </span>
        </a>
      </div>

      <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
      </button>

    </div>

    <div class="d-flex">

      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle header-profile-user" src="{{ url('admin/images/users/avatar-1.jpeg') }}" alt="Header Avatar">
          <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::user()->username }}</span>
          <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item text-danger" href="{{ url('adm/logout') }}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
        </div>
      </div>

      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
          <i class="bx bx-cog bx-spin"></i>
        </button>
      </div>

    </div>
  </div>
</header>

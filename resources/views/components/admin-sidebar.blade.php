<div class="vertical-menu">
  <div data-simplebar class="h-100">
    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-dashboard">Dashboard</li>
        <li>
          <a href="{{ url('adm') }}" class="waves-effect">
            <i class="bx bxs-dashboard"></i>
            <span key="t-dashboard">Dashboard</span>
          </a>
        </li>
        <li class="menu-title" key="t-dashboard">Content</li>
        <li>
          <a href="{{ url('adm/home') }}" class="waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-home">Home</span>
          </a>
        </li>
        <li>
          <a href="{{ url('adm/about-us') }}" class="waves-effect">
            <i class="bx bx-detail"></i>
            <span key="t-about-us">About Us</span>
          </a>
        </li>
        <li>
          <a href="{{ url('adm/contact-us') }}" class="waves-effect">
            <i class="bx bx-envelope"></i>
            <span key="t-contact-us">Contact Us</span>
          </a>
        </li>
        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-list-ul"></i>
            <span key="t-menus">Programs</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li>
              <a href="{{ url('adm/programs') }}" key="t-list-programs">List Programs</a>
            </li>
            <li>
              <a href="{{ url('adm/programs-category') }}" key="t-programs-category">Programs Category</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="{{ url('adm/instructors') }}" class="waves-effect">
            <i class="bx bx-user-voice"></i>
            <span key="t-instructors">Trainer/Instructor</span>
          </a>
        </li>
        <li>
          <a href="{{ url('adm/schedule') }}" class="waves-effect">
            <i class="bx bx-calendar-event"></i>
            <span key="t-schedule">Schedule</span>
          </a>
        </li>
        @if (Auth::user()->role == 1)
          <li class="menu-title" key="t-setting">Setting</li>
          <li>
            <a href="{{ url('adm/users') }}" class="waves-effect">
              <i class="bx bx-key"></i>
              <span key="t-access-control">Access Control</span>
            </a>
          </li>
        @endif
      </ul>
    </div>
    <!-- Sidebar -->
  </div>
</div>

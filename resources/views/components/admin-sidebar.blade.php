<div class="vertical-menu">
  <div data-simplebar class="h-100">
    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-dashboard">Dashboard</li>
        <li>
          <a href="#" class="waves-effect">
            <i class=""></i>
            <span key="t-dashboard">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class=""></i>
            <span key="t-menus">Courses</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li>
              <a href="{{ url('adm/courses') }}" key="t-list-courses">List Courses</a>
            </li>
            <li>
              <a href="{{ url('adm/courses-category') }}" key="t-courses-category">Courses Category</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- Sidebar -->
  </div>
</div>

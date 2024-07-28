<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 45, 'stickySetTop': '-45px', 'stickyChangeLogo': true}">
  <div class="header-body">
    <div class="header-container container">
      <div class="header-row">
        <div class="header-column">
          <div class="header-row">
            <div class="header-logo">
              <a href="{{ url('') }}">
                <img alt="Porto" width="80" height="" data-sticky-width="60" data-sticky-height="" data-sticky-top="25" src="{{ url('') }}/img/logo-starprof.png">
              </a>
            </div>
          </div>
        </div>
        <div class="header-column justify-content-end">
          <div class="header-row pt-3">
            <nav class="header-nav-top">
              <ul class="nav nav-pills">
                <li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-sm-show">
                  <span class="ws-nowrap"><i class="fas fa-phone"></i> {{ $phone }}</span>
                </li>
                <li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-sm-show">
                  <span class="ws-nowrap"><i class="fas fa-envelope"></i> {{ $email }}</span>
                </li>
              </ul>
            </nav>
          </div>
          <div class="header-row">
            <div class="header-nav pt-1">
              <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
                <nav class="collapse">
                  <ul class="nav nav-pills" id="mainNav">
                    <li>
                      <a href="{{ url('') }}/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    </li>
                    <li>
                      <a href="{{ url('') }}/about-us" class="nav-link {{ Request::is('about-us') ? 'active' : '' }}">About Us</a>
                    </li>
                    <li class="dropdown dropdown-full-color dropdown-primary">
                      <a class="dropdown-item dropdown-toggle {{ Request::is('programs') ? 'active' : '' }}" href="{{ url('') }}/programs">
                        Our Programs
                      </a>
                      <ul class="dropdown-menu">
                        @foreach ($program_categories as $item)
                          <li>
                            <a class="dropdown-item {{ Request::is('programs?category=' . Str::slug($item->category_name)) ? 'active' : '' }}" href="{{ url('programs?category=' . Str::slug($item->category_name)) }}">
                              {{ $item->category_name }}
                            </a>
                          </li>
                        @endforeach
                      </ul>
                    </li>
                    <li>
                      <a href="{{ url('') }}/instructors" class="nav-link {{ Request::is('instructors') ? 'active' : '' }}">Our Trainer</a>
                    </li>
                    <li>
                      <a href="{{ url('') }}/schedule" class="nav-link {{ Request::is('schedule') ? 'active' : '' }}">Programs Calendar</a>
                    </li>
                    <li>
                      <a href="{{ url('') }}/contact-us" class="nav-link {{ Request::is('contact-us') ? 'active' : '' }}">Contact Us</a>
                    </li>
                  </ul>

                </nav>
              </div>
              <ul class="header-social-icons social-icons d-none d-sm-block">
                <li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a></li>
                <li class="social-icons-youtube"><a href="http://www.youtube.com/" target="_blank" title="youtube"><i class="fab fa-youtube"></i></a></li>
                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
              <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                <i class="fas fa-bars"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

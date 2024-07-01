<header id="header" class="header-transparent header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 70, 'stickyHeaderContainerHeight': 70}">
  <div class="header-body header-body-bottom-border border-top-0">
    <div class="header-top bg-light border-0">
      <div class="container">
        <div class="header-row">
          <div class="header-column justify-content-start">
            <div class="header-row">
              <ul class="list list-unstyled list-inline mb-0">
                <li class="list-inline-item text-color-dark me-md-4 mb-0 d-none d-md-inline-block">
                  <span class="text-color-default text-2">Any Questions?</span>
                </li>
                <li class="list-inline-item me-4 mb-0">
                  <i class="icons icon-phone text-color-primary text-4 position-relative top-4 me-1"></i>
                  <a href="{{ url('') }}/tel:+1234567890" class="text-color-secondary text-color-hover-primary font-weight-semibold text-decoration-none text-2">
                    (800) 123-4567
                  </a>
                </li>
                <li class="list-inline-item me-4 mb-0 d-none d-md-inline-block">
                  <i class="icons icon-envelope text-color-primary text-4 position-relative top-4 me-1"></i>
                  <a href="{{ url('') }}/mailto:porto@portotheme.com" class="text-color-secondary text-color-hover-primary font-weight-semibold text-decoration-none text-2">
                    porto@portotheme.com
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="header-column justify-content-end">
            <div class="header-row">
              <ul class="list list-unstyled list-inline mb-0">
                <li class="list-inline-item mb-0">
                  <i class="icons icon-user text-color-primary text-4 position-relative top-4 me-1"></i>
                  <a href="{{ url('') }}/page-login.html" class="text-color-secondary text-color-hover-primary font-weight-semibold text-decoration-none text-2">
                    Login / Register
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-container container">
      <div class="header-row">
        <div class="header-column">
          <div class="header-row">
            <div class="header-logo">
              <a href="{{ url('') }}/demo-education.html">
                <img src="{{ url('') }}/img/demos/education/logo.png" class="img-fluid" width="123" height="49" alt="" />
              </a>
            </div>
          </div>
        </div>
        <div class="header-column justify-content-end">
          <div class="header-row">
            <div class="header-nav header-nav-links">
              <div class="header-nav-main header-nav-main-text-capitalize header-nav-main-effect-2 header-nav-main-sub-effect-1">
                <nav class="collapse">
                  <ul class="nav nav-pills" id="mainNav">
                    <li>
                      <a href="{{ url('') }}/" class="nav-link active">Home</a>
                    </li>
                    <li>
                      <a href="{{ url('') }}/about-us" class="nav-link">About Us</a>
                    </li>
                    <li>
                      <a href="{{ url('') }}/programs" class="nav-link">Programs</a>
                    </li>
                    <li>
                      <a href="{{ url('') }}/instructors" class="nav-link">Instructors</a>
                    </li>
                    <li>
                      <a href="{{ url('') }}/blog" class="nav-link">Blog</a>
                    </li>
                    <li>
                      <a href="{{ url('') }}/contact-us" class="nav-link">Contact Us</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="header-nav-features header-nav-features-no-border">
              <div class="header-nav-feature header-nav-features-search d-inline-flex">
                <a href="{{ url('') }}/#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch" aria-label="Search">
                  <i class="icons icon-magnifier header-nav-top-icon font-weight-bold text-4 top-2 text-color-primary"></i>
                </a>
                <div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed" id="headerTopSearchDropdown">
                  <form role="search" action="page-search-results.html" method="get">
                    <div class="simple-search input-group">
                      <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
                      <button class="btn" type="submit" aria-label="Search">
                        <i class="icons icon-magnifier header-nav-top-icon font-weight-bold text-color-dark text-4 text-color-hover-primary top-2"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
              <i class="fas fa-bars"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

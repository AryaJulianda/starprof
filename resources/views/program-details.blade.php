<x-layout>
  <div role="main" class="main">

    <section class="page-header page-header-modern page-header-background page-header-background-md custom-bg-color-grey-1 mb-0" style="background-image: url({{ url('') }}/img/demos/education/backgrounds/page-header.jpg); background-position: 100% 100%;">
      <div class="container">
        <div class="row mt-5">
          <div class="col align-self-center p-static text-center">
            <h1 class="font-weight-bold text-color-secondary text-10">{{ $program->prog_name }}</h1>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="row py-3">
        <div class="col">
          <ul class="breadcrumb d-block">
            <li><a href="#">Home</a></li>
            <li><a href="#">Courses</a></li>
            <li class="active">{{ $program->prog_name }}</li>
          </ul>
        </div>
      </div>
    </div>
    <section class="section custom-bg-color-grey-1 border-0 m-0">
      <div class="container">

        <div class="row py-3 gy-5 gy-lg-0">
          <!-- Sidebar -->
          <div class="col-lg-3 position-relative">

            <div class="mt-2 mb-4 pb-2">
              <section class="section section-height-3 bg-color-primary border-0 m-0">
                <div class="container p-relative py-3">

                  <div class="custom-element custom-element-pos-4 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="200">
                    <div class="opacity-2" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.8, 'transition': true, 'transitionDuration': 3000}">
                      <img class="icon-animated" width="157" height="157" src="{{ url('') }}/img/demos/education/elements/element-1.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light'}" />
                    </div>
                  </div>

                  <div class="row align-items-center justify-content-center text-center">
                    <div class="col col pt-2">
                      <h2 class="text-color-light font-weight-semi-bold text-7 mb-0 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="150">Ready to kick-start your career?</h2>

                      <a href="{{ url('contact-us') }}" class="btn btn-secondary font-weight-bold btn-px-5 btn-py-3 mt-4 mb-2 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="350">REGISTER NOW</a>
                    </div>
                  </div>
                </div>
              </section>
            </div>

          </div>

          <div class="col-lg-9 mt-0">
            <div class="custom-course-detail">

              <div class="d-md-flex mb-4">
                <div class="ps-md-0 mb-3 mb-md-0 pe-4 border-right">
                  <div class="d-flex align-items-center">
                    <div class="img-thumbnail img-thumbnail-no-borders rounded-circle">
                      <img src="{{ asset('storage/' . $program->join_instructor->photo) }}" class="custom-course-detail-avatar rounded-circle" alt="">
                    </div>
                    <div class="ps-3">
                      <p class="mb-0 text-1 text-uppercase p-relative top-3">Instructor</p>
                      <h4 class="mb-0 text-color-secondary text-4"><a href="demo-education-courses-details.html" class="text-color-secondary" title="">John Doe</a></h4>
                    </div>
                  </div>
                </div>
                <div class="ps-md-4 mb-3 mb-md-0 flex-grow-1">
                  <div class="d-flex flex-row align-items-center h-100">
                    <div class="p-0">
                      <p class="mb-0 text-1 text-uppercase p-relative top-3">Category</p>
                      <h4 class="mb-0 text-color-secondary text-4"><a href="demo-education-courses-details.html" class="text-color-secondary" title="">{{ $program->category->category_name }}</a></h4>
                    </div>
                  </div>
                </div>
                <div class="ps-md-4">
                  <div class="d-flex flex-row align-items-center h-100">
                    <div class="p-0">
                      <a href="{{ url('contact-us') }}" class="btn btn-secondary font-weight-bold btn-sm btn-px-2 btn-py-2">REGISTER NOW</a>
                      <a href="{{ $program->link }}" target="_blank" class="btn btn-success font-weight-bold btn-sm btn-px-2 btn-py-2">START LEARNING</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="pb-5">
                <div class="ratio ratio-16x9">
                  <img src="{{ asset('storage/' . $program->prog_image) }}" alt="{{ $program->prog_name }}">
                  {{-- <iframe src="http://player.vimeo.com/video/67957799" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> --}}
                </div>
              </div>

              {{-- <h2 class="text-color-secondary font-weight-semi-bold text-6 line-height-1 mb-3">Description</h2>

              <div class="text-3-5 line-height-9 mb-5"> {!! $program->desc !!}</div> --}}
            </div>
          </div>
        </div>
        {{-- - Deskripsi
        - Silabus
        - Harga
        - Kualifikasi / Prasyarat
        - Cara Pendaftaran --}}
        <div class="row">
          <div class="col">
            <div class="row">
              <div class="col-lg-3">
                <div class="tabs tabs-vertical tabs-left tabs-navigation">
                  <ul class="nav nav-tabs col-sm-3" role="tablist">
                    <li class="nav-item active" role="presentation">
                      <a class="nav-link active" href="#tabsNavigation1" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"><i class="fa-solid fa-note-sticky"></i> Deskripsi</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" href="#tabsNavigation2" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"><i class="fa-solid fa-receipt"></i> Silabus</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" href="#tabsNavigation3" data-bs-toggle="tab" aria-selected="true" role="tab"><i class="fa-solid fa-dollar-sign"></i> Harga</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" href="#tabsNavigation4" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"><i class="fa-solid fa-list-check"></i> Kualifikasi / Prasyarat</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" href="#tabsNavigation5" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"><i class="fas fa-question"></i> Cara Pendaftaran</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-9">
                <div class="tab-pane tab-pane-navigation active show" id="tabsNavigation1" role="tabpanel">
                  <h4>Deskripsi</h4>
                  {!! $program->desc !!}
                </div>
                <div class="tab-pane tab-pane-navigation" id="tabsNavigation2" role="tabpanel">
                  <h4>Silabus</h4>
                  {!! $program->silabus !!}
                </div>
                <div class="tab-pane tab-pane-navigation" id="tabsNavigation3" role="tabpanel">
                  <h4>Harga</h4>
                  {!! $program->price_desc !!}
                </div>
                <div class="tab-pane tab-pane-navigation" id="tabsNavigation4" role="tabpanel">
                  <h4>Kualifikasi / Prasyarat</h4>
                  {!! $program->qualification !!}
                </div>
                <div class="tab-pane tab-pane-navigation" id="tabsNavigation5" role="tabpanel">
                  <h4>Cara Pendaftaran</h4>
                  {!! $contact_us->how_to_register !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        {{--
        <div class="row d-flex justify-content-end">
          <div class="col-lg-9">
            <h2 class="text-color-secondary font-weight-semi-bold text-6 line-height-1 mb-4 mt-4">Related Courses</h2>

            <div class="row">
              <div class="col-md-4 mb-4 pb-1">
                <div class="card custom-card-courses border-radius-0 hover-effect-1">
                  <div class="p-relative">
                    <a href="demo-education-courses-details.html" class="text-color-secondary" title="">
                      <img class="card-img-top border-radius-0" src="{{ url('') }}/img/demos/education/courses/course-1.jpg" alt="" />
                    </a>
                    <div class="custom-card-courses-author">
                      <div class="img-thumbnail img-thumbnail-no-borders">
                        <img src="{{ url('') }}/img/avatars/avatar.jpg" class="rounded-circle" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <p class="mb-0 text-1 p-relative top-5 text-uppercase">John Doe</p>
                    <h4 class="mb-3 text-color-secondary"><a href="demo-education-courses-details.html" class="text-color-secondary" title="">Course Name Example</a></h4>

                    <div class="float-end">
                      <strong class="text-primary text-5">$79</strong>
                    </div>

                    <div class="text-2">
                      <span class="d-inline-block pe-2"><i class="far text-primary fa-user"></i> 123 </span>
                      <span class="d-inline-block pe-2"><i class="far text-primary fa-comments"></i> 123</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4 pb-1">
                <div class="card custom-card-courses border-radius-0 hover-effect-1">
                  <div class="p-relative">
                    <a href="demo-education-courses-details.html" class="text-color-secondary" title="">
                      <img class="card-img-top border-radius-0" src="{{ url('') }}/img/demos/education/courses/course-2.jpg" alt="" />
                    </a>
                    <div class="custom-card-courses-author">
                      <div class="img-thumbnail img-thumbnail-no-borders">
                        <img src="{{ url('') }}/img/avatars/avatar-2.jpg" class="rounded-circle" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <p class="mb-0 text-1 p-relative top-5 text-uppercase">John Doe</p>
                    <h4 class="mb-3 text-color-secondary"><a href="demo-education-courses-details.html" class="text-color-secondary" title="">Course Name Example</a></h4>

                    <div class="float-end">
                      <strong class="text-primary text-5">$59</strong>
                    </div>

                    <div class="text-2">
                      <span class="d-inline-block pe-2"><i class="far text-primary fa-user"></i> 123 </span>
                      <span class="d-inline-block pe-2"><i class="far text-primary fa-comments"></i> 123</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4 pb-1">
                <div class="card custom-card-courses border-radius-0 hover-effect-1">
                  <div class="p-relative">
                    <a href="demo-education-courses-details.html" class="text-color-secondary" title="">
                      <img class="card-img-top border-radius-0" src="{{ url('') }}/img/demos/education/courses/course-3.jpg" alt="" />
                    </a>
                    <div class="custom-card-courses-author">
                      <div class="img-thumbnail img-thumbnail-no-borders">
                        <img src="{{ url('') }}/img/avatars/avatar-3.jpg" class="rounded-circle" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <p class="mb-0 text-1 p-relative top-5 text-uppercase">John Doe</p>
                    <h4 class="mb-3 text-color-secondary"><a href="demo-education-courses-details.html" class="text-color-secondary" title="">Course Name Example</a></h4>

                    <div class="float-end">
                      <strong class="text-primary text-5">$29</strong>
                    </div>

                    <div class="text-2">
                      <span class="d-inline-block pe-2"><i class="far text-primary fa-user"></i> 123 </span>
                      <span class="d-inline-block pe-2"><i class="far text-primary fa-comments"></i> 123</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

      </div>
    </section>

  </div>
</x-layout>

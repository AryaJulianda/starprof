<x-layout>
  <div role="main" class="main">

    <section class="page-header page-header-modern page-header-background page-header-background-md custom-bg-color-grey-1 mb-0" style="background-image: url(img/demos/education/backgrounds/page-header.jpg); background-position: 100% 100%;">
      <div class="container">
        <div class="row mt-5">
          <div class="col align-self-center p-static text-center">
            <h1 class="font-weight-bold text-color-secondary text-10">Instructors</h1>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="row py-3">
        <div class="col">
          <ul class="breadcrumb d-block">
            <li><a href="#">Home</a></li>
            <li class="active">Instructors</li>
          </ul>
        </div>
      </div>
    </div>
    <section class="section custom-bg-color-grey-1 border-0 m-0">
      <div class="container">

        <div class="row py-3 gy-5 gy-lg-0">

          <div class="col">

            @foreach ($data as $item)
              <div class="row mb-5">
                <div class="col">
                  <div class="d-flex flex-wrap bg-light custom-link-hover-effects custom-instructor-details">
                    <div class="position-relative lazyload col-12 col-md-3" data-bg-src="{{ asset('storage/' . $item->photo) }}" style="background-position: center; background-size: cover; min-height: 302px; background-image:url('{{ asset('storage/' . $item->photo) }}')">
                    </div>
                    <div class="col-md-9 p-5">

                      <div class="d-md-flex mb-4">
                        <div class="ps-md-0 mb-3 mb-md-0 pe-4 me-4 border-right">
                          <div class="d-flex flex-row align-items-center h-100">
                            <div class="p-0">
                              <p class="mb-0 text-1 text-uppercase p-relative top-3">Full Name</p>
                              <h4 class="mb-0 text-color-secondary text-6">{{ $item->full_name }}</h4>
                            </div>
                          </div>
                        </div>
                        <div class="ps-md-0 mb-3 mb-md-0 pe-4 me-4 border-right">
                          <div class="d-flex flex-row align-items-center h-100">
                            <div class="p-0">
                              <p class="mb-0 text-1 text-uppercase p-relative top-3">Available Programs</p>
                              <h4 class="mb-0 text-color-secondary text-3">12</h4>
                            </div>
                          </div>
                        </div>
                        <div class="ps-md-4">
                          <div class="d-flex flex-row align-items-center h-100">
                            <div class="p-0">
                              <a href="{{ url('programs') }}" class="btn btn-secondary font-weight-bold btn-px-5 btn-py-3">VIEW PROGRAMS</a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="custom-read-more-style-1" data-plugin-readmore data-plugin-options="{
                                                            'buttonOpenLabel': 'View More <i class=\'fas fa-chevron-down text-2 ms-1\'></i>',
                                                            'buttonCloseLabel': 'View Less <i class=\'fas fa-chevron-up text-2 ms-1\'></i>',
                                                            'maxHeight': 120
                                                        }">
                        {!! $item->desc !!}
                        <div class="readmore-button-wrapper d-none">
                          <a href="#" class="text-decoration-none">
                            View More
                            <i class="fas fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            @endforeach

            <!-- Pagination Links -->
            <div class="row">
              <div class="col">
                <ul class="pagination float-end p-relative bottom-2">
                  {{ $data->links('pagination::bootstrap-4') }}
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
  </div>

  <section class="section section-height-3 bg-color-tertiary border-0 m-0">
    <div class="container py-3">
      <div class="row align-items-center justify-content-center text-center text-lg-start">
        <div class="col-md-8 col-lg-9 mb-4 mb-lg-0">
          <h2 class="text-color-primary font-weight-bold mb-0 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="150">Ready to kick-start your career?</h2>
        </div>
        <div class="col-lg-3 text-lg-end">
          <a href="demo-education-courses.html" class="btn btn-secondary font-weight-bold btn-px-5 btn-py-3 mt-4 mb-2 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="350">GET STARTED NOW</a>
        </div>
      </div>
    </div>
  </section>

  </div>
</x-layout>

<x-layout>
  <div role="main" class="main">

    <div class="container pt-5">

      <div class="row py-4 mb-2">
        <div class="col-md-7 order-2">
          <div class="overflow-hidden">
            <h2 class="text-color-dark font-weight-bold text-12 mb-2 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">{{ $instructor->full_name }}</h2>
          </div>
          <div class="overflow-hidden mb-3">
            <a href="mailto:{{ $instructor->email }}" class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">{{ $instructor->email }}</a>
          </div>
          <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">{!! $instructor->desc !!}</p>
          {{-- <p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">Consectetur adipiscing elit. Aliquam iaculis sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam.</p> --}}
          <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
          <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
            <div class="col-lg-6">
              <a href="mailto:{{ $instructor->email }}" class="btn btn-modern btn-dark mt-3">Get In Touch</a>
              <a href="tel:{{ $phone_link }}" class="btn btn-modern btn-primary mt-3">Call Me</a>
            </div>
            <div class="col-sm-6 text-lg-end my-4 my-lg-0">
              <strong class="text-uppercase text-1 me-3 text-dark">follow me</strong>
              <ul class="social-icons float-lg-end">
                <li class="social-icons-instagram"><a href="{{ $instructor->instagram }}" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                <li class="social-icons-linkedin"><a href="{{ $instructor->linkedin }}" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
          <img src="{{ asset('storage/' . $instructor->photo) }}" class="img-fluid mb-2" alt="">
        </div>
      </div>
    </div>

    {{-- <section class="section section-default border-0 mt-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1200">
      <div class="container py-4">

        <div class="row featured-boxes featured-boxes-style-4">
          <div class="col-md-6 col-lg-3 my-2">
            <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1600">
              <div class="box-content p-0 text-start">
                <i class="icon-featured icon-screen-tablet icons text-12 m-0 p-0"></i>
                <h4 class="font-weight-bold text-color-dark">Mobile Apps</h4>
                <p class="mb-0">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 my-2">
            <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1400">
              <div class="box-content p-0 text-start">
                <i class="icon-featured icon-layers icons text-12 m-0 p-0"></i>
                <h4 class="font-weight-bold text-color-dark">Creative Websites</h4>
                <p class="mb-0">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 my-2">
            <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1400">
              <div class="box-content p-0 text-start">
                <i class="icon-featured icon-magnifier icons text-12 m-0 p-0"></i>
                <h4 class="font-weight-bold text-color-dark">SEO Optimization</h4>
                <p class="mb-0">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 my-2">
            <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1600">
              <div class="box-content p-0 text-start">
                <i class="icon-featured icon-screen-desktop icons text-12 m-0 p-0"></i>
                <h4 class="font-weight-bold text-color-dark">Brand Solutions</h4>
                <p class="mb-0">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section> --}}

    <div class="container pt-5 pb-2">
      <div class="overflow-hidden">
        <h2 class="text-color-dark font-weight-normal text-6 mb-0 appear-animation" data-appear-animation="maskUp"><strong class="font-weight-extra-bold">Programs</strong></h2>
      </div>
      {{-- <div class="overflow-hidden mb-3">
        <p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">Lorem ipsum dolor sit amet, consectetur adipiscing elit massa enim. Nullam id varius nunc.</p>
      </div> --}}
      <div class="row">
        <div class="col">

          <div class="my-4 lightbox appear-animation" data-appear-animation="fadeInUpShorter" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
            <div class="owl-carousel owl-theme pb-3" data-plugin-options="{'items': 4, 'margin': 35, 'loop': false}">

              @foreach ($programs as $program)
                <div class="portfolio-item">
                  <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                    <span class="thumb-info-wrapper border-radius-0">
                      <img src="{{ asset('storage/' . $program->prog_image) }}" class="img-fluid border-radius-0" alt="">
                      <span class="thumb-info-title">
                        <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">{{ $program->prog_name }}</span>
                        <span class="thumb-info-type">{{ $program->category->category_name }}</span>
                      </span>
                      <span class="thumb-info-action">
                        <a href="{{ url('program-details/' . Str::slug($program->prog_name)) }}" class="lightbox-portfolio">
                          <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                        </a>
                      </span>
                    </span>
                  </span>
                </div>
              @endforeach

            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</x-layout>

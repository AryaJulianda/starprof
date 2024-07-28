<x-layout>
  <div role="main" class="main">
    <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7 m-0" style="background-image: url({{ asset('storage/' . $data->image) }});">
      <div class="container">
        <div class="row mt-5">
          <div class="col-md-12 align-self-center p-static order-2 text-center">
            <h1 class="text-9 font-weight-bold">About Us</h1>
            {{-- <span class="sub-title">The perfect choice for your next project</span> --}}
          </div>
          <div class="col-md-12 align-self-center order-1">
            <ul class="breadcrumb breadcrumb-light d-block text-center">
              <li><a href="{{ url('') }}">Home</a></li>
              <li class="active">About Us</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-height-3 bg-color-grey m-0 border-0">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-6 pb-sm-4 pb-lg-0 pe-lg-5 mb-sm-5 mb-lg-0">
            <h2 class="text-color-dark font-weight-normal text-6 mb-2">Who <strong class="font-weight-extra-bold">We Are</strong></h2>
            <p class="lead"> {!! $data->desc !!}</p>
          </div>
          <div class="col-sm-8 col-md-6 col-lg-4 offset-sm-4 offset-md-4 offset-lg-2 position-relative mt-sm-5" style="top: 1.7rem;">
            <img src="img/generic/generic-corporate-3-1.jpg" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="300" style="top: 10%; left: -50%;" alt="" />
            <img src="img/generic/generic-corporate-3-2.jpg" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" style="top: -33%; left: -29%;" alt="" />
            <img src="img/generic/generic-corporate-3-3.jpg" class="img-fluid position-relative appear-animation mb-2" data-appear-animation="expandIn" data-appear-animation-delay="600" alt="" />
          </div>
        </div>
      </div>
    </section>

    <div class="container">

      <div class="row pt-5">
        <div class="col">

          {{-- <div class="row text-center pb-5">
            <div class="col-md-9 mx-md-auto">
              <div class="overflow-hidden mb-3">
                <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
                  {!! $data->desc !!}
                </p>
              </div>
            </div>
          </div> --}}

          <div class="row mt-3 mb-5">
            <div class="col-md-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="800">
              <h3 class="font-weight-bold text-4 mb-2">Our Mission</h3>
              <p>{{ $data->mission }}</p>
            </div>
            <div class="col-md-4 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="600">
              <h3 class="font-weight-bold text-4 mb-2">Our Vision</h3>
              <p>{{ $data->vision }}</p>
            </div>
            <div class="col-md-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="800">
              <h3 class="font-weight-bold text-4 mb-2">Why Us</h3>
              <p>{{ $data->why_us }}</p>
            </div>
          </div>

        </div>
      </div>

    </div>

    <div class="container appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
      <div class="row pt-5 pb-4 my-5">
        <div class="col-md-6 order-2 order-md-1 text-center text-md-start">
          <div class="owl-carousel owl-theme nav-style-1 nav-center-images-only stage-margin mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 2}}, 'margin': 25, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
            @foreach ($instructors as $instructor)
              <div>
                <a href="{{ url('instructor-detail/' . Str::slug($instructor->full_name)) }}">
                  <img class="img-fluid rounded-0 mb-4" src="{{ asset('storage/' . $instructor->photo) }}" alt="" />
                  <h3 class="font-weight-bold text-color-dark text-4 mb-0">{{ $instructor->full_name }}</h3>
                  <a href="mailto:{{ $instructor->email }}" class="text-2 mb-0">{{ $instructor->email }}</a>
                </a>
              </div>
            @endforeach

          </div>
        </div>
        <div class="col-md-6 order-1 order-md-2 text-center text-md-start mb-5 mb-md-0">
          <h2 class="text-color-dark font-weight-normal text-6 mb-2 pb-1"><strong class="font-weight-extra-bold">Our Trainer</strong></h2>
          <p class="mb-4">{{ $data->our_trainer_desc }}</p>
        </div>
      </div>
    </div>

    <section class="section section-primary border-0 mb-0 appear-animation" data-appear-animation="fadeIn" data-plugin-options="{'accY': -150}">
      <div class="container">
        <div class="row counters counters-sm pb-4 pt-3">
          <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
            <div class="counter">
              <i class="icons icon-badge text-color-light"></i>
              <strong class="text-color-light font-weight-extra-bold" data-to="{{ $data->completed_course }}" data-append="+">0</strong>
              <label class="text-4 mt-1 text-color-light">Completed Courses</label>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
            <div class="counter">
              <i class="icons icon-people text-color-light"></i>
              <strong class="text-color-light font-weight-extra-bold" data-to="{{ $total_instructor }}">0</strong>
              <label class="text-4 mt-1 text-color-light">Total Instructor</label>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-5 mb-sm-0">
            <div class="counter">
              <i class="icons icon-user-following text-color-light"></i>
              <strong class="text-color-light font-weight-extra-bold" data-to="{{ $data->active_student }}" data-append="+">0</strong>
              <label class="text-4 mt-1 text-color-light">Active Student</label>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="counter">
              <i class="icons icon-clock text-color-light"></i>
              <strong class="text-color-light font-weight-extra-bold" data-to="{{ $data->total_training_hours }}" data-append="+">0</strong>
              <label class="text-4 mt-1 text-color-light">Total Training Hours</label>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section bg-color-grey section-height-3 border-0 m-0">
      <div class="container pb-2">
        <div class="row">
          <div class="col-lg-6 text-center text-md-start mb-5 mb-lg-0">
            <h2 class="text-color-dark font-weight-normal text-6 mb-2">About <strong class="font-weight-extra-bold">Our Clients</strong></h2>
            <div class="row justify-content-center my-5">
              @foreach ($our_clients as $item)
                <div class="col-8 text-center col-md-4">
                  <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid hover-effect-3" alt="" />
                </div>
              @endforeach
            </div>
          </div>
          <div class="col-lg-6">
            <div class="owl-carousel owl-theme nav-style-1 stage-margin" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 1}, '1200': {'items': 1}}, 'loop': true, 'nav': false, 'dots': false, 'stagePadding': 40, 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
              @foreach ($testimonials as $test)
                <div>
                  <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark testimonial-remove-right-quote ps-md-4 mb-0">
                    <div class="testimonial-author">
                      <img src="{{ asset('storage/' . $test->image) }}" class="img-fluid rounded-circle mb-0" alt="{{ $test->image }}">
                    </div>
                    <blockquote>
                      <p class="text-color-dark text-4 line-height-5 mb-0">{{ $test->text }}</p>
                    </blockquote>
                    <div class="testimonial-author">
                      <p><strong class="font-weight-extra-bold text-2">{{ $test->name }}</strong>{{-- <span>Okler</span> --}}</p>
                    </div>
                  </div>
                </div>
              @endforeach
              {{-- <div>
                <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark testimonial-remove-right-quote ps-md-4 mb-0">
                  <div class="testimonial-author">
                    <img src="img/clients/client-1.jpg" class="img-fluid rounded-circle mb-0" alt="">
                  </div>
                  <blockquote>
                    <p class="text-color-dark text-4 line-height-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae metus tellus. Curabitur non lorem at odio tempus consectetur vel eu lacus. Morbi.</p>
                  </blockquote>
                  <div class="testimonial-author">
                    <p><strong class="font-weight-extra-bold text-2">John Smith</strong><span>Okler</span></p>
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  {{-- <div role="main" class="main">

    <section class="page-header page-header-modern page-header-background page-header-background-md custom-bg-color-grey-1 mb-0" style="background-image: url(img/demos/education/backgrounds/page-header.jpg); background-position: 100% 100%;">
      <div class="container">
        <div class="row mt-5">
          <div class="col align-self-center p-static text-center">
            <h1 class="font-weight-bold text-color-secondary text-10">About Us</h1>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="row py-3">
        <div class="col">
          <ul class="breadcrumb d-block">
            <li><a href="#">Home</a></li>
            <li class="active">About Us</li>
          </ul>
        </div>
      </div>
      <div class="row py-3">
        <div class="col">

          <p class="font-weight-medium text-4">{!! $data->desc !!}</p>

          <img class="img-fluid lazyload" src="{{ url('') }}/img/lazy.png" data-src="{{ asset('storage/' . $data->image) }}" alt="" />

          {{-- <div class="row justify-content-center my-5">
            <div class="col-lg-8 text-center">
              <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-primary mb-0">
                <blockquote>
                  <p class="mb-0 custom-font-1 fst-italic text-5 line-height-7">Pellentesque ultricies nibh gravida, accumsan libero luctus, molestie nunc. In nibh ipsum, blandit id faucibus accumsan libero luctus, molestie nunc.</p>
                </blockquote>
                <div class="testimonial-author">
                  <p><strong class="font-weight-bold text-color-secondary">John Doe - CEO & Founder</strong></p>
                </div>
              </div>
              <img src="{{ url('') }}/img/demos/education/signature.png" class="img-fluid my-4" alt="" />
            </div>
          </div>

          <div class="row my-5">
            <div class="col-md-6">
              <div class="overflow-hidden">
                <div class="overflow-hidden mb-3-5">
                  <h2 class="text-color-secondary font-weight-semi-bold text-6 line-height-1 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Our Mission</h2>
                </div>
                <p class="text-3-5 line-height-9 mb-5 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="300">{{ $data->mission }}</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="overflow-hidden">
                <div class="overflow-hidden mb-3-5">
                  <h2 class="text-color-secondary font-weight-semi-bold text-6 line-height-1 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">Our Vision</h2>
                </div>
                <p class="text-3-5 line-height-9 mb-5 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="700">{{ $data->vision }}</p>
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

  </div> --}}
</x-layout>

<x-layout>
  <div role="main" class="main">

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

          <div class="row justify-content-center my-5">
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

          <div class="row">
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

  </div>
</x-layout>

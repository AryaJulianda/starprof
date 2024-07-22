<x-layout>
  <div role="main" class="main">

    <div class="custom-bg-color-grey-1">
      <div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover show-dots-xs nav-style-1 nav-arrows-thin nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0" data-plugin-options="{'autoplay': true, 'autoplayTimeout': 7000}" data-dynamic-height="['calc(100vh - 135px)','calc(100vh - 135px)','calc(100vh - 161px)','calc(100vh - 161px)','calc(100vh - 161px)']" style="height: calc(100vh - 135px);">
        <div class="owl-stage-outer">
          <div class="owl-stage">

            @foreach ($carousels as $item)
              <div class="owl-item position-relative overflow-hidden">
                <div class="background-image-wrapper custom-bg-color-grey-1 position-absolute top-0 left-0 right-0 bottom-0" data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show style="background-image: url({{ url('') }}/img/demos/education/slides/slide-1-bg.jpg); background-size: cover; background-position: 100% 100%;">
                </div>

                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid position-absolute bottom-0 d-none d-lg-block custom-slider-el-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" alt="" />{{-- 587*689 --}}

                <div class="container h-100 r-relative z-index-1">
                  <div class="row h-100 align-items-center">
                    <div class="col">
                      <div class="text-end float-lg-start custom-slider-text-block">
                        <h2 class="text-color-secondary font-weight-extra-bold mb-4 custom-slider-text-1 p-relative z-index-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800"><em>#</em>{{ $item->text_1 }}</h2>
                        <h2 class="text-color-default font-weight-semi-bold mb-3 text-5 p-relative z-index-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">{{ $item->text_2 }}</h2>
                        <a href="{{ url('') }}/#courses" data-hash data-hash-offset="0" data-hash-offset-lg="70" class="btn btn-secondary font-weight-bold btn-px-5 btn-py-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">GET STARTED</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach

            <!-- Carousel Slide 1 -->
            {{-- <div class="owl-item position-relative overflow-hidden">
              <div class="background-image-wrapper custom-bg-color-grey-1 position-absolute top-0 left-0 right-0 bottom-0" data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show style="background-image: url(img/demos/education/slides/slide-1-bg.jpg); background-size: cover; background-position: 100% 100%;">
              </div>

              <img src="{{ url('') }}/img/demos/education/slides/slide-1-1.png" class="img-fluid position-absolute bottom-0 d-none d-lg-block custom-slider-el-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" alt="" />//587*689

              <div class="container h-100 r-relative z-index-1">
                <div class="row h-100 align-items-center">
                  <div class="col">
                    <div class="text-end float-lg-start custom-slider-text-block">
                      <h2 class="text-color-secondary font-weight-extra-bold mb-4 custom-slider-text-1 p-relative z-index-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800"><em>#</em>letslearn</h2>
                      <h2 class="text-color-default font-weight-semi-bold mb-3 text-5 p-relative z-index-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">Complete Solution For Your Education Needs!</h2>
                      <a href="{{ url('') }}/#courses" data-hash data-hash-offset="0" data-hash-offset-lg="70" class="btn btn-secondary font-weight-bold btn-px-5 btn-py-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">GET STARTED</a>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}

            <!-- Carousel Slide 2 -->
            {{-- <div class="owl-item position-relative overflow-hidden">
              <div class="background-image-wrapper custom-bg-color-grey-1 position-absolute top-0 left-0 right-0 bottom-0" data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show style="background-image: url(img/demos/education/slides/slide-2-bg.jpg); background-size: cover; background-position: 100% 100%;">
              </div>

              <img src="{{ url('') }}/img/demos/education/slides/slide-2-1.png" class="img-fluid position-absolute bottom-0 d-none d-lg-block custom-slider-el-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" alt="" />

              <div class="container h-100 r-relative z-index-1">
                <div class="row h-100 align-items-center">
                  <div class="col">
                    <div class="float-lg-end custom-slider-text-block text-end">
                      <h2 class="text-color-secondary font-weight-extra-bold mb-4 custom-slider-text-1 p-relative z-index-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800"><em>#</em>yourfuture</h2>
                      <h2 class="text-color-default font-weight-semi-bold mb-3 text-5 p-relative z-index-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">Complete Solution For Your Education Needs!</h2>
                      <a href="{{ url('') }}/#courses" data-hash data-hash-offset="0" data-hash-offset-lg="70" class="btn btn-secondary font-weight-bold btn-px-5 btn-py-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">GET STARTED</a>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}

          </div>
        </div>
        <div class="owl-nav">
          <button type="button" role="presentation" class="owl-prev" aria-label="Previous"></button>
          <button type="button" role="presentation" class="owl-next" aria-label="Next"></button>
        </div>
      </div>
    </div>

    <div class="bg-light">
      <div class="container py-4">
        <div class="row pb-2 mb-1">
          <div class="col-md-4 mb-4 mb-md-0">

            <div class="feature-box feature-box-steps">
              <div class="feature-box-step-number appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="250">
                <em>1.</em>
              </div>
              <div class="feature-box-icon bg-color-quaternary feature-box-icon-extra-large appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="250">
                <img class="icon-animated" width="100" height="46" src="{{ url('') }}/img/demos/education/icons/icon-web-search-engine.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
              </div>
              <div class="feature-box-info appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="150">
                <p class="mt-2 pt-1 mb-0 text-1 p-relative top-5 text-uppercase">Step 1</p>
                <h4 class="mb-0 text-color-secondary">Find Your Course</h4>
              </div>
            </div>

          </div>
          <div class="col-md-4 mb-4 mb-md-0">

            <div class="feature-box feature-box-steps">
              <div class="feature-box-step-number appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="500">
                <em>2.</em>
              </div>
              <div class="feature-box-icon bg-color-quaternary feature-box-icon-extra-large appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="500">
                <img class="icon-animated" width="42" height="42" src="{{ url('') }}/img/demos/education/icons/icon-list.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary ms-2'}" />
              </div>
              <div class="feature-box-info appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="300">
                <p class="mt-2 pt-1 mb-0 text-1 p-relative top-5 text-uppercase">Step 2</p>
                <h4 class="mb-0 text-color-secondary">Make a Register</h4>
              </div>
            </div>

          </div>
          <div class="col-md-4">

            <div class="feature-box feature-box-steps">
              <div class="feature-box-step-number appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="750">
                <em>3.</em>
              </div>
              <div class="feature-box-icon bg-color-quaternary feature-box-icon-extra-large appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="750">
                <img class="icon-animated" width="45" height="45" src="{{ url('') }}/img/demos/education/icons/icon-laptop.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
              </div>
              <div class="feature-box-info appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="450">
                <p class="mt-2 pt-1 mb-0 text-1 p-relative top-5 text-uppercase">Step 3</p>
                <h4 class="mb-0 text-color-secondary">Enjoy and Learn</h4>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <section class="section custom-bg-color-grey-1 border-0 m-0" id="courses">
      <div class="container position-relative my-4">

        <div class="custom-element custom-element-pos-1 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="200">
          <div class="opacity-2" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.8, 'transition': true, 'transitionDuration': 3000}">
            <img class="icon-animated" width="157" height="157" src="{{ url('') }}/img/demos/education/elements/element-1.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
          </div>
        </div>

        <div class="row mb-4">
          <div class="col text-center">
            <div class="overflow-hidden">
              <h2 class="text-color-secondary font-weight-semi-bold text-6 line-height-1 mb-3-5 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">Our Programs</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="500">
            <div class="owl-carousel owl-theme nav-style-1 nav-outside nav-font-size-lg custom-nav-secondary mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 2}, '992': {'items': 2}, '1200': {'items': 3}}, 'loop': true, 'nav': true, 'dots': false, 'margin': 20}">
              @foreach ($program_categories as $category)
                <div>
                  <div class="card custom-card-courses border-radius-0">
                    <div class="p-relative">
                      <a href="{{ url('programs?category=' . Str::slug($category->category_name)) }}" class="text-color-secondary" title="">
                        <img class="card-img-top border-radius-0" src="{{ asset('storage/' . $category->category_image) }}" alt="Category Image" />
                      </a>
                      {{-- <div class="custom-card-courses-author">
                        <div class="img-thumbnail img-thumbnail-no-borders rounded-circle">
                          <img src="{{ asset('storage/') }}" class="rounded-circle" alt="">
                        </div>
                      </div> --}}
                    </div>
                    <div class="card-body">
                      <p class="mb-0 text-1 p-relative top-5 text-uppercase">{{ $category->programs_count }} Programs</p>
                      <h4 class="mb-3 text-color-secondary"><a href="{{ url('programs?category=' . Str::slug($category->category_name)) }}" class="text-color-secondary" title="">{{ $category->category_name }}</a></h4>

                      <div class="float-end">
                        <a href="{{ url('programs?category=' . Str::slug($category->category_name)) }}" class="text-primary text-5 font-weight-semi-bold">Detail</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-background custom-section-background-1 bg-color-tertiary border-0 m-0" style="background-image: url({{ url('') }}/img/demos/education/backgrounds/background-1.jpg); background-position: 100% 100%; background-repeat: no-repeat; background-size: contain;">
      <div class="container my-4">
        <div class="row mb-4">
          <div class="col-lg-6">
            <div class="card border-radius-0 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="350">
              <div class="card-body py-5 my-2">

                <div class="row">
                  <div class="col px-4">
                    <div class="text-center">
                      <h2 class="text-color-secondary font-weight-semi-bold text-8 line-height-1 mb-2">Register Now</h2>
                      <p class="text-4">Get <strong>50% OFF</strong> For All Courses</p>
                    </div>
                    <div class="countdown text-color-primary font-weight-semibold custom-countdown-style-1 justify-content-center mb-4 py-2 px-2" data-plugin-countdown data-plugin-options="{'textDay': 'DAYS', 'textHour': 'HRS', 'textMin': 'MIN', 'textSec': 'SEC', 'date': '2025/01/01 12:00:00', 'wrapperClass': 'text-color-primary', 'numberClass': 'font-weight-semibold text-color-primary'}"></div>

                    <form class="custom-form-style-1 contact-form" action="php/contact-form.php" method="POST">

                      <div class="contact-form-success alert alert-success d-none mt-4">
                        <strong>Success!</strong> Your register has been sent to us.
                      </div>

                      <div class="contact-form-error alert alert-danger d-none mt-4">
                        <strong>Error!</strong> There was an error sending your register.
                        <span class="mail-error-message text-1 d-block"></span>
                      </div>

                      <div class="row g-2">
                        <div class="form-group col-md-6 mb-2">
                          <input type="text" value="" data-msg-required="Please enter your first name." maxlength="100" class="form-control p-3 bg-color-tertiary" name="firstName" id="firstName" placeholder="FIRST NAME*" required>
                        </div>
                        <div class="form-group col-md-6 mb-2">
                          <input type="text" value="" data-msg-required="Please enter your last name." maxlength="100" class="form-control p-3 bg-color-tertiary custom-border-start-1" name="lastName" id="lastName" placeholder="LAST NAME*" required>
                        </div>
                      </div>
                      <div class="row g-2">
                        <div class="form-group col-md-6 mb-2">
                          <input type="text" value="" data-msg-required="Please enter your phone number." maxlength="100" class="form-control p-3 bg-color-tertiary" name="phone" id="phone" placeholder="PHONE*" required>
                        </div>
                        <div class="form-group col-md-6 mb-2">
                          <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control p-3 bg-color-tertiary custom-border-start-1" name="email" id="email" placeholder="EMAIL*" required>
                        </div>
                      </div>
                      <div class="row g-2">
                        <div class="form-group col mb-0">
                          <input type="submit" value="GET IT NOW" class="btn btn-secondary font-weight-bold d-block btn-px-5 btn-py-3 w-100" data-loading-text="Loading...">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section custom-bg-color-grey-1 border-0 m-0">
      <div class="container position-relative my-4">

        <div class="custom-element custom-element-pos-2 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="200">
          <div class="opacity-2" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.8, 'transition': true, 'transitionDuration': 3000}">
            <img class="icon-animated" width="157" height="157" src="{{ url('') }}/img/demos/education/elements/element-1.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
          </div>
        </div>

        <div class="row mb-4">
          <div class="col text-center">
            <div class="overflow-hidden">
              <h2 class="text-color-secondary font-weight-semi-bold text-6 line-height-1 mb-3-5 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">What Students Say</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="350">
            <div class="owl-carousel owl-theme nav-style-1 nav-outside nav-font-size-lg custom-nav-secondary mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 1}, '1200': {'items': 1}}, 'loop': true, 'nav': true, 'dots': false, 'margin': 20}">
              @foreach ($testimonials as $item)
                <div class="px-lg-5 mx-lg-5">
                  <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-primary mb-0">
                    <div class="testimonial-author">
                      <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded-circle" alt="">{{-- 120*120 --}}
                    </div>
                    <blockquote>
                      <p class="mb-0 custom-font-1 fst-italic text-4 line-height-7">{{ $item->text }}</p>
                    </blockquote>
                    <div class="testimonial-author">
                      <p><strong class="font-weight-bold">{{ $item->name }}</strong></p>
                    </div>
                  </div>
                </div>
              @endforeach

              {{-- <div class="px-lg-5 mx-lg-5">
                <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-primary mb-0">
                  <div class="testimonial-author">
                    <img src="{{ url('') }}/img/clients/client-2.jpg" class="img-fluid rounded-circle" alt="">
                  </div>
                  <blockquote>
                    <p class="mb-0 custom-font-1 fst-italic text-4 line-height-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget risus porta, tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ante tellus, convallis non consectetur sed, pharetra nec ex.</p>
                  </blockquote>
                  <div class="testimonial-author">
                    <p><strong class="font-weight-bold">John Smith</strong></p>
                  </div>
                </div>
              </div>
              <div class="px-lg-5 mx-lg-5">
                <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-primary mb-0">
                  <div class="testimonial-author">
                    <img src="{{ url('') }}/img/clients/client-3.jpg" class="img-fluid rounded-circle" alt="">
                  </div>
                  <blockquote>
                    <p class="mb-0 custom-font-1 fst-italic text-4 line-height-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget risus porta, tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ante tellus, convallis non consectetur sed, pharetra nec ex.</p>
                  </blockquote>
                  <div class="testimonial-author">
                    <p><strong class="font-weight-bold">John Smith</strong></p>
                  </div>
                </div>
              </div>
              <div class="px-lg-5 mx-lg-5">
                <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-primary mb-0">
                  <div class="testimonial-author">
                    <img src="{{ url('') }}/img/clients/client-4.jpg" class="img-fluid rounded-circle" alt="">
                  </div>
                  <blockquote>
                    <p class="mb-0 custom-font-1 fst-italic text-4 line-height-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget risus porta, tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ante tellus, convallis non consectetur sed, pharetra nec ex.</p>
                  </blockquote>
                  <div class="testimonial-author">
                    <p><strong class="font-weight-bold">John Smith</strong></p>
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section bg-color-tertiary border-0 m-0">
      <div class="container my-4">
        <div class="row mb-4">
          <div class="col text-center">
            <div class="overflow-hidden">
              <h2 class="text-color-secondary font-weight-semi-bold text-6 line-height-1 mb-3-5 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">Latest News</h2>
            </div>
          </div>
        </div>
        <div class="row pb-3">
          @foreach ($latest_blogs as $blog)
            <div class="col-lg-4 mb-4 mb-lg-0">
              <article class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                <div class="card border-0 border-radius-0 box-shadow-1">
                  <div class="card-body p-3 z-index-1">
                    <a href="{{ url('') }}/demo-education-blog-post.html">
                      <img class="card-img-top border-radius-0 mb-2" src="{{ asset('storage/' . $blog->image) }}" alt="Card Image">
                    </a>
                    <p class="text-uppercase text-color-default text-1 my-2">
                      <time pubdate datetime="2024-01-10">{{ $blog->created_at }}</time>
                    </p>
                    <div class="card-body p-0">
                      <h4 class="card-title text-5 font-weight-semi-bold pb-1 mb-2"><a class="text-color-secondary text-decoration-none" href="{{ url('blog/' . \Illuminate\Support\Str::slug($blog->title)) }}">{{ $blog->title }}</a></h4>
                      <p class="card-text mb-2">{!! \Illuminate\Support\Str::limit($blog->text, 150, '...') !!}</p>
                      <a href="{{ url('blog/' . \Illuminate\Support\Str::slug($blog->title)) }}" class="btn btn-link font-weight-semibold text-decoration-none text-2 ps-0">READ MORE</a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <section class="section section-background custom-section-background-2 bg-color-light border-0 m-0" style="background-image: url(img/demos/education/backgrounds/background-2.jpg); background-position: 0 100%; background-repeat: no-repeat; background-size: contain;">
      <div class="container position-relative my-4">

        <div class="custom-element custom-element-pos-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="200">
          <div class="opacity-2" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.8, 'transition': true, 'transitionDuration': 3000}">
            <img class="icon-animated" width="157" height="157" src="{{ url('') }}/img/demos/education/elements/element-1.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-dark'}" />
          </div>
        </div>

        <div class="row justify-content-end mb-4">
          <div class="col-lg-6 py-4">

            @foreach ($whys as $item)
              <div class="row">
                <div class="col">
                  <div class="feature-box feature-box-style-5">
                    <div class="feature-box-icon appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="100">
                      <img class="icon-animated" width="50" src="{{ asset('storage/' . $item->image) }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                    </div>
                    <div class="feature-box-info">
                      <div class="overflow-hidden">
                        <h2 class="text-color-secondary font-weight-semi-bold text-6 line-height-1 mb-2 pb-1 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{ $item->header }}</h2>
                      </div>
                      <p class="text-3-5 line-height-9 mb-5 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="100">{{ $item->text }}</p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach

            {{-- <div class="row">
              <div class="col">
                <div class="feature-box feature-box-style-5">
                  <div class="feature-box-icon appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="200">
                    <img class="icon-animated" width="50" src="{{ url('') }}/img/demos/education/icons/icon-list.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                  </div>
                  <div class="feature-box-info">
                    <div class="overflow-hidden">
                      <h2 class="text-color-secondary font-weight-semi-bold text-6 line-height-1 mb-2 pb-1 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">Many Courses</h2>
                    </div>
                    <p class="text-3-5 line-height-9 mb-5 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="200">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis elit vitae enim vehicula fermentum consectetur adipiscing elit.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="feature-box feature-box-style-5">
                  <div class="feature-box-icon appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="300">
                    <img class="icon-animated" width="50" src="{{ url('') }}/img/demos/education/icons/icon-badge.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                  </div>
                  <div class="feature-box-info">
                    <div class="overflow-hidden">
                      <h2 class="text-color-secondary font-weight-semi-bold text-6 line-height-1 mb-2 pb-1 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">The Best Instructors</h2>
                    </div>
                    <p class="text-3-5 line-height-9 mb-0 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis elit vitae enim vehicula fermentum consectetur adipiscing elit. </p>
                  </div>
                </div>
              </div>
            </div> --}}

          </div>
        </div>
      </div>
    </section>

  </div>
</x-layout>

<x-layout>
  <div role="main" class="main">

    <section class="page-header page-header-modern page-header-background page-header-background-md custom-bg-color-grey-1 mb-0" style="background-image: url(img/demos/education/backgrounds/page-header.jpg); background-position: 100% 100%;">
      <div class="container">
        <div class="row mt-5">
          <div class="col align-self-center p-static text-center">
            <h1 class="font-weight-bold text-color-secondary text-10">Programs</h1>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="row py-3">
        <div class="col">
          <ul class="breadcrumb d-block">
            <li><a href="#">Home</a></li>
            <li class="active">Programs</li>
          </ul>
        </div>
      </div>
    </div>
    <section class="section custom-bg-color-grey-1 border-0 m-0">
      <div class="container">

        <div class="row py-3 gy-5 gy-lg-0">
          <div class="col-lg-9 mt-0">

            <div class="row">
              @foreach ($list_programs as $item)
                <div class="col-md-4 mb-4 pb-1">
                  <div class="card custom-card-courses border-radius-0 hover-effect-1">
                    <div class="p-relative">
                      <a href="{{ url('program-details/' . Str::slug($item->prog_name)) }}" class="text-color-secondary" title="">
                        <div class="card-img-top border-radius-0" src="" alt="" style="height:200px; background-image:url('{{ asset('storage/' . $item->prog_image) }}'); background-size:cover; background-position:center;"></div> <!--340x180-->
                      </a>
                      <div class="custom-card-courses-author">
                        <div class="img-thumbnail img-thumbnail-no-borders">
                          <img src="{{ url('') }}/img/avatars/avatar.jpg" class="rounded-circle" alt="">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <p class="mb-0 text-1 p-relative top-5 text-uppercase">John Doe</p>
                      <h4 class="mb-3 text-color-secondary"><a href="{{ url('program-details/' . Str::slug($item->prog_name)) }}" class="text-color-secondary" title="">{{ $item->prog_name }}</a></h4>

                      <div class="float-end">
                        <strong class="text-primary text-5">$79</strong>
                      </div>

                      {{-- <div class="text-2">
                        <span class="d-inline-block pe-2"><i class="far text-primary fa-user"></i> 123 </span>
                        <span class="d-inline-block pe-2"><i class="far text-primary fa-comments"></i> 123</span>
                      </div> --}}
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            <div class="row">
              <div class="col">
                {{ $list_programs->appends(['category' => $selected_category_slug])->links('pagination::bootstrap-4') }}
              </div>
            </div>

          </div>

          <!-- Sidebar -->
          <div class="col-lg-3 position-relative">

            <div class="mt-2 mb-4 pb-2">
              <h2 class="text-color-secondary font-weight-semi-bold text-5 line-height-1 mb-3">Categories</h2>

              <ul class="nav nav-list flex-column p-relative right-9">
                @foreach ($list_categories as $item)
                  <li class="nav-item">
                    <a class="nav-link bg-transparent border-0 {{ $selected_category_slug == Str::slug($item->category_name) ? 'active' : '' }}" href="{{ url('programs?category=' . Str::slug($item->category_name)) }}">
                      {{ $item->category_name }} ({{ $item->programs_count }})
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>

            <div class="mt-2 mb-4 pb-2">

              <h2 class="text-color-secondary font-weight-semi-bold text-5 line-height-1 mb-3">Latest Courses</h2>

              <ul class="simple-post-list">
                <li class="border-0">
                  <div class="post-image">
                    <div class="img-thumbnail img-thumbnail-no-borders d-block">
                      <a href="blog-post.html">
                        <img src="{{ url('') }}/img/demos/education/courses/course-1.jpg" width="80" alt="">
                      </a>
                    </div>
                  </div>
                  <div class="post-info">
                    <a href="blog-post.html" class="text-color-secondary text-3 font-weight-semi-bold line-height-4 d-block pb-1">Course Name Example</a>
                    <div class="post-meta">
                      <strong class="text-primary text-4">$79</strong>
                    </div>
                  </div>
                </li>
                <li class="border-0">
                  <div class="post-image">
                    <div class="img-thumbnail img-thumbnail-no-borders d-block">
                      <a href="blog-post.html">
                        <img src="{{ url('') }}/img/demos/education/courses/course-2.jpg" width="80" alt="">
                      </a>
                    </div>
                  </div>
                  <div class="post-info">
                    <a href="blog-post.html" class="text-color-secondary text-3 font-weight-semi-bold line-height-4 d-block pb-1">Course Name Example</a>
                    <div class="post-meta">
                      <strong class="text-primary text-4">$79</strong>
                    </div>
                  </div>
                </li>
                <li class="border-0">
                  <div class="post-image">
                    <div class="img-thumbnail img-thumbnail-no-borders d-block">
                      <a href="blog-post.html">
                        <img src="{{ url('') }}/img/demos/education/courses/course-3.jpg" width="80" alt="">
                      </a>
                    </div>
                  </div>
                  <div class="post-info">
                    <a href="blog-post.html" class="text-color-secondary text-3 font-weight-semi-bold line-height-4 d-block pb-1">Course Name Example</a>
                    <div class="post-meta">
                      <strong class="text-primary text-4">$79</strong>
                    </div>
                  </div>
                </li>
              </ul>

            </div>

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

                      <a href="demo-education-courses.html" class="btn btn-secondary font-weight-bold btn-px-5 btn-py-3 mt-4 mb-2 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="350">GET STARTED NOW</a>
                    </div>
                  </div>
                </div>
              </section>
            </div>

          </div>
        </div>

      </div>
    </section>

  </div>
</x-layout>

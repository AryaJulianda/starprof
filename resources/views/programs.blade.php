<x-layout>
  <div role="main" class="main">

    <section class="page-header page-header-modern bg-color-grey page-header-md ">
      <div class="container-fluid">
        <div class="row align-items-center">

          <div class="col">
            <div class="row">
              <div class="col-md-12 align-self-center p-static order-2 text-center">
                <div class="overflow-hidden pb-2">
                  <h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Our Programs</h2>
                </div>
              </div>
              {{-- <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Portfolio</a></li>
                  <li class="active">Grid</li>
                </ul>
              </div> --}}
            </div>
          </div>

        </div>
      </div>
    </section>

    <div class="container py-2">

      <div class="row d-row justify-content-center">
        <form action="{{ url('programs') }}" method="GET" class="col-12">
          <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search program..." value="{{ request()->query('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
        </form>
      </div>

      <ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
        <li class="nav-item {{ $selected_category_slug == '' ? 'active' : '' }}" data-option-value="*"><a class="nav-link text-2-5 text-uppercase {{ $selected_category_slug == '' ? 'active' : '' }}" href="{{ url('programs') }}" onclick="redirectCategory(this)">Show All</a></li>
        @foreach ($list_categories as $item)
          <li class="nav-item {{ $selected_category_slug == Str::slug($item->category_name) ? 'active' : '' }}" data-option-value="*"><a class="nav-link text-2-5 text-uppercase {{ $selected_category_slug == Str::slug($item->category_name) ? 'active' : '' }}" href="{{ url('programs?category=' . Str::slug($item->category_name)) }}" onclick="redirectCategory(this)">{{ $item->category_name }}</a></li>
        @endforeach
      </ul>

      <script>
        function redirectCategory(element) {
          event.preventDefault();
          var targetUrl = element.getAttribute('href');
          window.location.href = targetUrl;
        }
      </script>

      <div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
        <div class="row portfolio-list sort-destination" data-sort-id="portfolio">

          @foreach ($list_programs as $item)
            <div class="col-md-6 col-lg-4 isotope-item">
              <div class="portfolio-item">
                <a href="{{ url('program-details/' . Str::slug($item->prog_name)) }}">
                  <span class="thumb-info thumb-info-lighten border-radius-0">
                    <span class="thumb-info-wrapper border-radius-0">
                      <img src="{{ asset('storage/' . $item->prog_image) }}" class="img-fluid border-radius-0" alt="">

                      <span class="thumb-info-title">
                        <span class="thumb-info-inner">{{ $item->prog_name }}</span>
                        <span class="thumb-info-type">{{ $item->category->category_name }}</span>
                      </span>
                      <span class="thumb-info-action">
                        <span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
                      </span>
                    </span>
                  </span>
                </a>
              </div>
            </div>
          @endforeach

        </div>

        {{-- pagination --}}
        <div class="row">
          <div class="col d-flex justify-content-center">
            {{ $list_programs->appends(['category' => $selected_category_slug, 'search' => request()->query('search')])->links('pagination::bootstrap-4') }}
          </div>
        </div>

      </div>

    </div>

  </div>

</x-layout>

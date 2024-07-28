<x-layout>

  <div role="main" class="main">
    <section class="page-header page-header-modern bg-color-grey page-header-md ">
      <div class="container-fluid">
        <div class="row align-items-center">

          <div class="col">
            <div class="row">
              <div class="col-md-12 align-self-center p-static order-2 text-center">
                <div class="overflow-hidden pb-2">
                  <h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Programs Calendar</h2>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4 mb-3">
          <div class="simple-search input-group">
            <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Cari Berdasarkan Nama Program...">
            <button class="btn" type="submit" aria-label="Search"> <i class="fas fa-search header-nav-top-icon"></i> </button>
          </div>
        </div>
        <div class="col-6 col-md-2">
          <select class="form-select form-control border-color-primary mb-3" id="selectStatus" onchange="redirectToSelectedUrl(this)">
            <option value="{{ url('schedule') . "?category=$categorySlug" . '&status=all' }}" {{ $statusSlug == 'all' ? 'selected' : '' }}>All Status</option>
            @foreach ($select_status as $item)
              <option value="{{ url('schedule') . "?category=$categorySlug" . '&status=' . Str::lower($item->lookup_value) }}" {{ Str::lower($item->lookup_value) == $statusSlug ? 'selected' : '' }}>{{ $item->lookup_value }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-6 col-md-2">
          <select class="form-select form-control border-color-primary mb-3" id="selectMonth" onchange="redirectToSelectedUrl(this)">
            <option value="{{ url('schedule') . "?category=$categorySlug&status=$statusSlug&month=all" }}" {{ $monthSlug == 'all' ? 'selected' : '' }}>All Month</option>
            @foreach ($months as $month)
              <option value="{{ url('schedule') . "?category=$categorySlug&status=$statusSlug&month=$month" }}" {{ $monthSlug == $month ? 'selected' : '' }}>{{ \Carbon\Carbon::parse($month . '-01')->isoFormat('MMMM YYYY') }}</option>
            @endforeach
          </select>
        </div>

      </div>

      <div class="tabs">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link {{ empty($categorySlug) ? 'active' : '' }}" href="javascript:void(0);" onclick="redirectTo('{{ url('schedule') }}')" data-bs-toggle="tab" aria-selected="{{ empty($categorySlug) ? 'true' : 'false' }}" role="tab">All</a>
          </li>
          @foreach ($list_categories as $item)
            @php
              $itemSlug = Str::slug($item->category_name);
            @endphp
            <li class="nav-item" role="presentation">
              <a class="nav-link {{ $categorySlug === $itemSlug ? 'active' : '' }}" href="javascript:void(0);" data-bs-toggle="tab" aria-selected="{{ $categorySlug === $itemSlug ? 'true' : 'false' }}" role="tab" tabindex="-1" onclick="redirectTo('{{ url('schedule' . '?category=' . $itemSlug) }}')">{{ $item->category_name }}</a>
            </li>
          @endforeach
        </ul>

        <div class="tab-content">
          {{-- table --}}
          <div class="row">
            <div class="col pb-3">
              <table class="table table-hover" id="schedule-table">
                <thead>
                  <tr>
                    <th>
                      Program
                    </th>
                    <th>
                      Tanggal
                    </th>
                    <th>
                      Waktu
                    </th>
                    <th>
                      Harga
                    </th>
                    <th>
                      Lokasi
                    </th>
                    <th>
                      Seat Tersisa
                    </th>
                    <th>
                      Status
                    </th>
                    <th>

                    </th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($list_schedule as $i => $schedule)
                    <tr>
                      <td>
                        <a href="{{ url('program-details/' . Str::slug($schedule->program_name)) }}" style="font-weight: bold">{{ $schedule->program_name }}</a>
                      </td>
                      <td>
                        {{ $schedule->formatted_tanggal }}
                      </td>
                      <td>
                        {{ $schedule->waktu }}
                      </td>
                      <td>
                        Rp. {{ number_format($schedule->harga, 0, ',', '.') }}
                      </td>
                      <td>
                        @if (Str::lower($schedule->lokasi) == 'online')
                          <button class="btn btn-sm btn-rounded btn-outline-primary" style="text-transform: capitalize;" disabled>{{ $schedule->lokasi }}</button>
                        @else
                          <button class="btn btn-sm btn-rounded btn-outline-info" style="text-transform: capitalize;" disabled>{{ $schedule->lokasi }}</button>
                        @endif
                      </td>
                      <td>
                        {{ $schedule->seat_tersisa }}
                      </td>
                      <td>
                        @if (Str::lower($schedule->status) == 'tersedia')
                          <button class="btn btn-sm btn-rounded btn-outline-success" style="text-transform: capitalize;" disabled>{{ $schedule->status }}</button>
                        @elseif (Str::lower($schedule->status) == 'penuh')
                          <button class="btn btn-sm btn-rounded btn-outline-danger" style="text-transform: capitalize;" disabled>{{ $schedule->status }}</button>
                        @elseif (Str::lower($schedule->status) == 'ditutup')
                          <button class="btn btn-sm btn-rounded btn-outline-secondary" style="text-transform: capitalize;" disabled>{{ $schedule->status }}</button>
                        @endif
                      </td>
                      <td>
                        <button class="btn btn-sm btn-primary" {{ $schedule->status != 'Tersedia' ? 'disabled' : '' }}>Daftar</button>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="8" class="text-center">
                        <div class="row py-5">
                          <div class="col">
                            <h2 class="font-weight-normal text-7 mb-0">Jadwal tidak ditemukan</h2>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @endforelse
                </tbody>

              </table>
            </div>
          </div>
          {{-- pagination --}}
          <div class="row">
            <div class="col d-flex justify-content-end">
              {{ $list_schedule->links('pagination::bootstrap-4') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function redirectTo(url) {
      window.location.href = url;
    }

    function redirectToSelectedUrl(selectElement) {
      var selectedValue = selectElement.options[selectElement.selectedIndex].value;
      window.location.href = selectedValue;
    }
  </script>

</x-layout>

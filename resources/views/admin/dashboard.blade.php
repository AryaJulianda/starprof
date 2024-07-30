<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <div class="row">
    <div class="col-md-3">
      <div class="card mini-stats-wid">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <p class="text-muted fw-medium">Total Categories</p>
              <h4 class="mb-0">{{ $total_categories }}</h4>
            </div>

            <div class="flex-shrink-0 align-self-center">
              <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                <span class="avatar-title">
                  <i class="bx bx-sitemap font-size-24"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card mini-stats-wid">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <p class="text-muted fw-medium">Total Programs</p>
              <h4 class="mb-0">{{ $total_programs }}</h4>
            </div>

            <div class="flex-shrink-0 align-self-center ">
              <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                <span class="avatar-title rounded-circle bg-primary">
                  <i class="bx bx-list-ul font-size-24"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card mini-stats-wid">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <p class="text-muted fw-medium">Total Trainer</p>
              <h4 class="mb-0">{{ $total_instructor }}</h4>
            </div>

            <div class="flex-shrink-0 align-self-center">
              <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                <span class="avatar-title rounded-circle bg-primary">
                  <i class="bx bxs-user-detail font-size-24"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card mini-stats-wid">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <p class="text-muted fw-medium">Total Registrations</p>
              <h4 class="mb-0">{{ $total_registrations }}</h4>
            </div>

            <div class="flex-shrink-0 align-self-center">
              <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                <span class="avatar-title rounded-circle bg-primary">
                  <i class="bx bxs-graduation font-size-24"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">Programs per Trainer</h4>
          <div id="chart-trainer"></div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">Programs per Category</h4>
          <div id="chart-category"></div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">Schedules per Month</h4>
          <div id="chart-schedule"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Chart Trainer
    var optionsChartTrainer = {
      series: [{
        name: 'Trainer',
        data: [
          @foreach ($programs_per_instructors as $item)
            '{{ $item->programs_count }}',
          @endforeach
        ]
      }],
      chart: {
        type: 'bar',
        height: 350
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '55%',
          endingShape: 'rounded'
        },
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: [
          @foreach ($programs_per_instructors as $item)
            '{{ $item->full_name }}',
          @endforeach
        ],
      },
      yaxis: {
        title: {
          text: 'total programs'
        }
      },
      fill: {
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return val + " program"
          }
        }
      }
    };

    var chartTrainer = new ApexCharts(document.querySelector("#chart-trainer"), optionsChartTrainer);
    chartTrainer.render();

    // Chart Category
    var optionChartCategory = {
      series: [{
        name: 'Category',
        data: [
          @foreach ($programs_per_category as $item)
            '{{ $item->programs_count }}',
          @endforeach
        ]
      }],
      chart: {
        type: 'bar',
        height: 350
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '55%',
          endingShape: 'rounded'
        },
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: [
          @foreach ($programs_per_category as $item)
            '{{ $item->category_name }}',
          @endforeach
        ],
      },
      yaxis: {
        title: {
          text: 'total programs'
        }
      },
      fill: {
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return val + " program"
          }
        }
      }
    };

    var chartCategory = new ApexCharts(document.querySelector("#chart-category"), optionChartCategory);
    chartCategory.render();

    // Chart Schedule
    var optionSchedule = {
      series: [{
        name: 'Schedule',
        data: [
          @foreach ($schedules_per_month as $month => $count)
            '{{ $count }}',
          @endforeach
        ]
      }],
      chart: {
        type: 'bar',
        height: 350
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '55%',
          endingShape: 'rounded'
        },
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: [
          @foreach ($schedules_per_month as $month => $count)
            '{{ \Carbon\Carbon::createFromFormat('Y-m', $month)->format('M Y') }}',
          @endforeach
        ],
      },
      yaxis: {
        title: {
          text: 'total schedule'
        }
      },
      fill: {
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return val + " schedule"
          }
        }
      }
    };

    var chartSchedule = new ApexCharts(document.querySelector("#chart-schedule"), optionSchedule);
    chartSchedule.render();
  </script>
</x-admin-layout>

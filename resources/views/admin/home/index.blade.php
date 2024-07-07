<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <h4>List Carousel</h4>
            <div class="d-flex" style="gap:5px;">
              <a href="{{ url('adm/carousels/create') }}" class="btn btn-primary waves-effect btn-label waves-light">
                <i class="bx bx-plus label-icon"></i> Create
              </a>
            </div>
          </div>
          <table id="datatable-carousels" class="table table-bordered dt-responsive nowrap w-100">
            <thead>
              <tr>
                <th>No</th>
                <th>Text 1</th>
                <th>Text 2</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <h4>List Testimonial</h4>
            <div class="d-flex" style="gap:5px;">
              <a href="{{ url('adm/testimonials/create') }}" class="btn btn-primary waves-effect btn-label waves-light">
                <i class="bx bx-plus label-icon"></i> Create
              </a>
            </div>
          </div>
          <table id="datatable-testimonials" class="table table-bordered dt-responsive nowrap w-100">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Text</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <h4>List Why Choose Us</h4>
            <div class="d-flex" style="gap:5px;">
              <a href="{{ url('adm/whys/create') }}" class="btn btn-primary waves-effect btn-label waves-light">
                <i class="bx bx-plus label-icon"></i> Create
              </a>
            </div>
          </div>
          <table id="datatable-whys" class="table table-bordered dt-responsive nowrap w-100">
            <thead>
              <tr>
                <th>No</th>
                <th>Header</th>
                <th>Text</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->

  <script src="{{ url("admin/js/pages/$module_path/index.js") }}"></script>
</x-admin-layout>

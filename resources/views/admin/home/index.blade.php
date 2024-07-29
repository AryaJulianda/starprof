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

  <div class="row">
    <div class="col-md-6 col-xl-12">
      <div class="card">
        <div class="card-body">
          <form id="form-quotes" enctype="multipart/form-data" class="needs-validation" action="{{ url('adm/quotes') }}" novalidate>
            @method('PUT')
            <div class="d-flex justify-content-between">
              <h4>Quotes</h4>
              <button class="btn btn-primary me-2" type="submit">Save</button>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="mt-3">
                  <label for="quotes_by_name" class="form-label">Quotes By Name</label>
                  <input type="text" id="quotes_by_name" class="form-control" name="quotes_by_name" placeholder="Quotes By Name" value="{{ isset($quotes) ? $quotes->quotes_by_name : '' }}">
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="quotes_by_status" class="form-label">Quotes By Status</label>
                  <input type="text" id="quotes_by_status" class="form-control" name="quotes_by_status" placeholder="Quotes By Status" value="{{ isset($quotes) ? $quotes->quotes_by_status : '' }}">
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="quotes_text" class="form-label">Quotes Text</label>
                  <textarea id="text-editor" class="form-control" name="quotes_text" rows="3" placeholder="Quotes Text">{{ isset($quotes) ? $quotes->quotes_text : '' }}</textarea>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="image_file" class="form-label d-block">Image</label>
                  <img id="image-preview" src="{{ isset($quotes) ? asset('storage/' . $quotes->image) : '' }}" alt="Image" class="img-thumbnail mb-3" style="max-width: 200px;">
                  <input type="file" class="form-control" id="image_file" placeholder="image_file" name="image_file" value="" onchange="previewImage(event)">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- end card -->
    </div> <!-- end col -->
  </div>


  <script src="{{ url("admin/js/pages/$module_path/index.js") }}"></script>
  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById('image-preview');
        output.src = reader.result;
        output.style.display = 'block';
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</x-admin-layout>

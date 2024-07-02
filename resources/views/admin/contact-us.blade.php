<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="row">
    <div class="col-md-6 col-xl-12">
      <div class="card">
        <div class="card-body">
          <form id="form-contact-us" enctype="multipart/form-data" class="needs-validation" action="{{ url("adm/$module_path") }}" novalidate>
            @method('PUT')
            <div class="d-flex justify-content-end">
              <button class="btn btn-primary me-2" type="submit">Save</button>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="mt-3">
                  <label for="location" class="form-label">Location</label>
                  <input type="text" id="location" class="form-control" name="location" placeholder="Location" value="{{ isset($dataForm) ? $dataForm->location : '' }}" required>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="text" id="phone" class="form-control" name="phone" placeholder="Phone" value="{{ isset($dataForm) ? $dataForm->phone : '' }}" required>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" id="email" class="form-control" name="email" placeholder="Email" value="{{ isset($dataForm) ? $dataForm->email : '' }}" required>
                </div>
              </div>
              <div class="col-md-6 col-xl-3">
                <div class="mt-3">
                  <label for="updatedBy" class="form-label">Updated By</label>
                  <input type="text" class="form-control" id="updatedBy" placeholder="Autofill" value="{{ isset($dataForm) ? $dataForm->updated_by : '' }}" disabled>
                </div>
              </div>
              <div class="col-md-6 col-xl-3">
                <div class="mt-3">
                  <label for="updatedDate" class="form-label">Updated Date</label>
                  <input type="text" class="form-control" id="updatedDate" placeholder="Autofill" value="{{ isset($dataForm) ? $dataForm->updated_at : '' }}" disabled>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- end card -->
    </div> <!-- end col -->
  </div>
  <!-- end row -->

  <script src="{{ url("admin/js/pages/$module_path/form.js") }}"></script>
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

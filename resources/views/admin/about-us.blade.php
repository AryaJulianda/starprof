<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="row">
    <div class="col-md-6 col-xl-12">
      <div class="card">
        <div class="card-body">
          <form id="form-about-us" enctype="multipart/form-data" class="needs-validation" action="{{ url("adm/$module_path") }}" novalidate>
            @method('PUT')
            <div class="d-flex justify-content-end">
              <button class="btn btn-primary me-2" type="submit">Save</button>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="mt-3">
                  <label for="desc" class="form-label">Description</label>
                  <textarea id="text-editor" class="form-control" name="desc" rows="3" placeholder="Description">{{ isset($dataForm) ? $dataForm->desc : '' }}</textarea>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="image_file" class="form-label d-block">Image</label>
                  <img id="image-preview" src="{{ isset($dataForm) ? asset('storage/' . $dataForm->image) : '' }}" alt="Image" class="img-thumbnail mb-3" style="max-width: 200px;">
                  <input type="file" class="form-control" id="image_file" placeholder="image_file" name="image_file" value="" onchange="previewImage(event)">
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="vision" class="form-label">Vision</label>
                  <textarea id="vision" class="form-control" name="vision" rows="3" placeholder="Vision">{{ isset($dataForm) ? $dataForm->vision : '' }}</textarea>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="mission" class="form-label">Mission</label>
                  <textarea id="mission" class="form-control" name="mission" rows="3" placeholder="Mission">{{ isset($dataForm) ? $dataForm->mission : '' }}</textarea>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="why_us" class="form-label">Why Us</label>
                  <textarea id="why_us" class="form-control" name="why_us" rows="3" placeholder="Why Us">{{ isset($dataForm) ? $dataForm->why_us : '' }}</textarea>
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

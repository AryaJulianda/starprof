<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="row">
    <div class="col-md-6 col-xl-12">
      <div class="card">
        <div class="card-body">
          <form id="form" enctype="multipart/form-data" class="needs-validation" action="{{ isset($dataForm) ? url("adm/$module_path/$dataForm->id") : url("adm/$module_path") }}" novalidate>
            @if (isset($dataForm))
              @method('PUT')
            @endif
            <div class="d-flex justify-content-end">
              @if ($type != 'view')
                <button class="btn btn-primary me-2" type="submit">{{ isset($dataForm) ? 'Save' : 'Create' }}</button>
              @endif
              <a class="btn btn-secondary" href="{{ url('adm/home') }}">Cancel</a>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="mt-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ isset($dataForm) ? $dataForm->name : '' }}" {{ $type == 'view' ? 'disabled' : 'required' }}>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="text" class="form-label">Text</label>
                  <textarea class="form-control" id="text" placeholder="Text" name="text" {{ $type == 'view' ? 'disabled' : 'required' }}>{{ isset($dataForm) ? $dataForm->text : '' }}</textarea>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="image_file" class="form-label d-block">Image</label>
                  <img id="image-preview" src="{{ isset($dataForm) && $dataForm->image ? asset('storage/' . $dataForm->image) : '#' }}" alt="Program Image" class="img-thumbnail mb-3" style="max-width: 200px; {{ isset($dataForm) && $dataForm->image ? '' : 'display:none;' }}">
                  <input type="file" class="form-control" id="image_file" placeholder="image_file" name="image_file" value="" onchange="previewImage(event)" {{ $type == 'view' ? 'disabled' : '' }}>
                </div>
              </div>
              <div class="col-md-6 col-xl-3">
                <div class="mt-3">
                  <label for="createdBy" class="form-label">Created By</label>
                  <input type="text" class="form-control" id="createdBy" placeholder="Autofill" value="{{ isset($dataForm) ? $dataForm->created_by : '' }}" disabled>
                </div>
              </div>
              <div class="col-md-6 col-xl-3">
                <div class="mt-3">
                  <label for="createdDate" class="form-label">Created Date</label>
                  <input type="text" class="form-control" id="createdDate" placeholder="Autofill" value="{{ isset($dataForm) ? $dataForm->created_at : '' }}" disabled>
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

  <script src="{{ url("admin/js/pages/home/form-$module_path.js") }}"></script>
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

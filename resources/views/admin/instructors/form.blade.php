<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="row">
    <div class="col-md-6 col-xl-12">
      <div class="card">
        <div class="card-body">
          <form id="form-instructors" enctype="multipart/form-data" class="needs-validation" action="{{ isset($dataForm) ? url("adm/$module_path/$dataForm->id") : url("adm/$module_path") }}" novalidate>
            @if (isset($dataForm))
              @method('PUT')
            @endif
            <div class="d-flex justify-content-end">
              @if ($type != 'view')
                <button class="btn btn-primary me-2" type="submit">{{ isset($dataForm) ? 'Save' : 'Create' }}</button>
              @endif
              <a class="btn btn-secondary" href="{{ url("adm/$module_path") }}">Cancel</a>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="mt-3">
                  <label for="full_name" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="full_name" placeholder="Full Name" name="full_name" value="{{ isset($dataForm) ? $dataForm->full_name : '' }}" {{ $type == 'view' ? 'disabled' : 'required' }}>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ isset($dataForm) ? $dataForm->email : '' }}" {{ $type == 'view' ? 'disabled' : 'required' }}>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="instagram" class="form-label">Link Instagram</label>
                  <input type="text" class="form-control" id="instagram" placeholder="Link Instagram" name="instagram" value="{{ isset($dataForm) ? $dataForm->instagram : '' }}" {{ $type == 'view' ? 'disabled' : 'required' }}>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="linkedin" class="form-label">Link Linkedin</label>
                  <input type="text" class="form-control" id="linkedin" placeholder="Link Linkedin" name="linkedin" value="{{ isset($dataForm) ? $dataForm->linkedin : '' }}" {{ $type == 'view' ? 'disabled' : 'required' }}>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="photo_file" class="form-label d-block">Photo</label>
                  <img id="image-preview" src="{{ isset($dataForm) && $dataForm->photo ? asset('storage/' . $dataForm->photo) : '#' }}" alt="Photo" class="img-thumbnail mb-3" style="max-width: 200px; {{ isset($dataForm) && $dataForm->photo ? '' : 'display:none;' }}">
                  <input type="file" accept="image/*" class="form-control" id="photo_file" placeholder="photo_file" name="photo_file" value="" onchange="previewImage(event)" {{ $type == 'view' ? 'disabled' : '' }}>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="desc" class="form-label">Description</label>
                  @if ($type == 'view')
                    <div id="desc-view" class="form-control" style="height: 200px; overflow-y: auto;">
                      {!! $dataForm->desc !!}
                    </div>
                  @else
                    <textarea id="textarea" class="form-control" name="desc" rows="3" placeholder="Description" {{ $type == 'view' ? 'disabled' : 'required' }}>{{ isset($dataForm) ? $dataForm->desc : '' }}</textarea>
                  @endif
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
  @if ($type == 'view')
    <script>
      $(document).ready(function() {
        tinymce.EditorManager.execCommand('mceRemoveEditor', true, 'textarea');
      });
    </script>
  @endif
</x-admin-layout>

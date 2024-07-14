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
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ isset($dataForm) ? $dataForm->title : '' }}" {{ $type == 'view' ? 'disabled' : 'required' }}>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="image_file" class="form-label d-block">Image</label>
                  <img id="image-preview" src="{{ isset($dataForm) && $dataForm->image ? asset('storage/' . $dataForm->image) : '#' }}" alt="Photo" class="img-thumbnail mb-3" style="max-width: 200px; {{ isset($dataForm) && $dataForm->image ? '' : 'display:none;' }}">
                  <input type="file" class="form-control" id="image_file" placeholder="image_file" name="image_file" value="" onchange="previewImage(event)" {{ $type == 'view' ? 'disabled' : '' }}>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="text" class="form-label">Text</label>
                  @if ($type == 'view')
                    <div id="text-view" class="form-control" style="height: 200px; overflow-y: auto;">
                      {!! $dataForm->text !!}
                    </div>
                  @else
                    <textarea id="textarea" class="form-control" name="text" rows="3" placeholder="Text" {{ $type == 'view' ? 'disabled' : 'required' }}>{{ isset($dataForm) ? $dataForm->text : '' }}</textarea>
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

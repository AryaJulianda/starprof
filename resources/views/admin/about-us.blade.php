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
                  <input type="file" class="form-control" id="image_file" accept="image/*" placeholder="image_file" name="image_file" value="" onchange="previewImage(event)">
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
              <div class="col-12">
                <div class="mt-3">
                  <label for="our_trainer_desc" class="form-label">Our Trainer Desc</label>
                  <textarea id="our_trainer_desc" class="form-control" name="our_trainer_desc" rows="3" placeholder="Our Trainer Desc">{{ isset($dataForm) ? $dataForm->our_trainer_desc : '' }}</textarea>
                </div>
              </div>
              <div class="col-md-6 col-xl-3">
                <div class="mt-3">
                  <label for="completed_course" class="form-label">Completed Course</label>
                  <input type="number" id="completed_course" class="form-control" name="completed_course" placeholder="Completed Course" value="{{ isset($dataForm) ? $dataForm->completed_course : '' }}">
                </div>
              </div>
              <div class="col-md-6 col-xl-3">
                <div class="mt-3">
                  <label for="total_trainer" class="form-label">Total Instructor/Trainer</label>
                  <input type="number" id="total_trainer" class="form-control" name="total_trainer" placeholder="Total Instructor/Trainer" value="{{ $total_instructor }}" disabled>
                </div>
              </div>
              <div class="col-md-6 col-xl-3">
                <div class="mt-3">
                  <label for="active_student" class="form-label">Active Student</label>
                  <input type="number" id="active_student" class="form-control" name="active_student" placeholder="Active Student" value="{{ isset($dataForm) ? $dataForm->active_student : '' }}">
                </div>
              </div>
              <div class="col-md-6 col-xl-3">
                <div class="mt-3">
                  <label for="total_training_hours" class="form-label">Total Training Hours</label>
                  <input type="number" id="total_training_hours" class="form-control" name="total_training_hours" placeholder="Total Training Hours" value="{{ isset($dataForm) ? $dataForm->total_training_hours : '' }}">
                </div>
              </div>
              <div class="row mt-3">
                <div class="d-flex justify-content-between">
                  <label class="form-label">Our Clients</label>
                  <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">Add Client</button>
                </div>
                <div class="row">
                  @foreach ($our_clients as $item)
                    <div class="col-md-6 col-xl-3 border">
                      <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="Responsive image">
                    </div>
                  @endforeach
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

  {{-- MODAL --}}
  <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Add Client</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img id="image-preview-cl" src="" alt="Image" class="img-thumbnail mb-3" style="max-width: 200px; display:none;   ">
          <input type="file" accept="image/*" class="form-control" id="image_file_client" name="image_file_client" value="" onchange="previewImageCl(event)">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
          <button type="button" id="save-client" class="btn btn-primary waves-effect waves-light">Save</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  {{-- MODAL --}}

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

    function previewImageCl(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById('image-preview-cl');
        output.src = reader.result;
        output.style.display = 'block';
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</x-admin-layout>

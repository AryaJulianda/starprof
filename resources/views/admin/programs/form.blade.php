<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  @php
    $module_path = 'programs';
  @endphp
  <div class="row">
    <div class="col-md-6 col-xl-12">
      <div class="card">
        <div class="card-body">
          <form id="form-department" method="{{ isset($dataForm) ? 'PUT' : 'POST' }}" class="needs-validation" action="{{ isset($dataForm) ? url("$module_path/$dataForm->id") : url("$module_path") }}" novalidate>
            <div class="d-flex justify-content-end">
              @if ($type != 'view')
                <button class="btn btn-primary me-2" type="submit">{{ isset($dataForm) ? 'Save' : 'Create' }}</button>
              @endif
              <a class="btn btn-secondary" href="{{ url("adm/$module_path") }}">Cancel</a>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="mt-3">
                  <label for="program_name" class="form-label">Program Name</label>
                  <input type="text" class="form-control" id="program_name" placeholder="Program Name" value="{{ isset($dataForm) ? $dataForm->program_name : '' }}">
                </div>
              </div>
              <div class="col-4">
                <div class="mt-3">
                  <label for="program_category" class="form-label">Program Category</label>
                  <select class="form-select" id="program_category">
                    <option>-- Select Program Category --</option>
                    <option>Large select</option>
                    <option>Small select</option>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="banner" class="form-label">Banner</label>
                  <input type="file" class="form-control" id="banner" placeholder="Banner" value="{{ isset($dataForm) ? $dataForm->banner : '' }}">
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="desc" class="form-label">Description</label>
                  <textarea id="textarea" class="form-control" id="desc" rows="3" placeholder="Description">{{ isset($dataForm) ? $dataForm->desc : '' }}</textarea>
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


  <script src="{{ url("js/pages/$module_path/form.js") }}"></script>
</x-admin-layout>

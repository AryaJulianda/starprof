<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="row">
    <div class="col-md-6 col-xl-12">
      <div class="card">
        <div class="card-body">
          <form id="form-department" method="{{ isset($dataForm) ? 'PUT' : 'POST' }}" class="needs-validation" action="{{ isset($dataForm) ? url("departments/$dataForm->id") : url('departments') }}" novalidate>
            <div class="d-flex justify-content-end">
              @if ($type != 'view')
                <button class="btn btn-primary me-2" type="submit">{{ isset($dataForm) ? 'Save' : 'Create' }}</button>
              @endif
              <a class="btn btn-secondary" href="{{ url('departments') }}">Cancel</a>
            </div>
            <div class="row">
              <div class="col-md-6 col-xl-3">
                <div class="mt-3">
                  <label for="transCode" class="form-label">Trans Code</label>
                  <input type="text" class="form-control" id="transCode" placeholder="Auto Generate" value="{{ isset($dataForm) ? $dataForm->trans_code : '' }}" disabled>
                </div>
              </div>
              <div class="col-md-6 col-xl-3">
                <div class="mt-3">
                  <label for="departmentName" class="form-label">Department Name</label>
                  <input type="text" class="form-control" id="departmentName" name="dept_name" value="{{ isset($dataForm) ? $dataForm->dept_name : '' }}" {{ $type == 'view' ? 'disabled' : '' }} required>
                  <div class="invalid-feedback">
                    Required!
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-3">
                <div class="mt-3">
                  <label for="departmentCode" class="form-label">Department Code</label>
                  <input type="text" class="form-control" id="departmentCode" name="dept_code" value="{{ isset($dataForm) ? $dataForm->dept_code : '' }}" {{ $type == 'view' ? 'disabled' : '' }} required>
                  <div class="invalid-feedback">
                    Required!
                  </div>
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


  <script src="{{ url('js/pages/departments/form.js') }}"></script>
</x-admin-layout>

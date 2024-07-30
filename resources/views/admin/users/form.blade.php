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
              <a class="btn btn-secondary" href="{{ url("adm/$module_path") }}">Cancel</a>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="mt-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ isset($dataForm) ? $dataForm->username : '' }}" {{ $type == 'view' ? 'disabled' : 'required' }}>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="role" class="form-label">Role</label>
                  <select class="form-select" name="role" id="role" {{ $type == 'view' ? 'disabled' : 'required' }}>
                    <option value="">-- Select Role --</option>
                    @foreach ($select_role as $item)
                      <option value="{{ $item->lookup_id }}" {{ isset($dataForm) && $item->lookup_id == $dataForm->role ? 'selected' : '' }}>{{ $item->lookup_value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              @if ($type == 'create')
                <div class="col-12">
                  <div class="mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{ isset($dataForm) ? $dataForm->password : '' }}">
                  </div>
                </div>
              @endif
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
</x-admin-layout>

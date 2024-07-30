<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="row">
    <div class="col-md-6 col-xl-12">
      <div class="card">
        <div class="card-body">
          <form id="form-programs-category" enctype="multipart/form-data" method="{{ isset($dataForm) ? 'PUT' : 'POST' }}" class="needs-validation" action="{{ isset($dataForm) ? url("adm/programs-category/$dataForm->id") : url('adm/programs-category') }}" novalidate>
            @if (isset($dataForm))
              @method('PUT')
            @endif

            <div class="d-flex justify-content-end">
              @if ($type != 'view')
                <button class="btn btn-primary me-2" type="submit">{{ isset($dataForm) ? 'Save' : 'Create' }}</button>
              @endif
              <a class="btn btn-secondary" href="{{ url('adm/programs-category') }}">Cancel</a>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="mt-3">
                  <label for="categoryName" class="form-label">Category Name</label>
                  <input type="text" class="form-control" id="categoryName" name="category_name" value="{{ isset($dataForm) ? $dataForm->category_name : '' }}" {{ $type == 'view' ? 'disabled' : '' }} required>
                  <div class="invalid-feedback">
                    Required!
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="category_image_file" class="form-label d-block">Image</label>
                  <img id="image-preview" src="{{ isset($dataForm) && $dataForm->category_image ? asset('storage/' . $dataForm->category_image) : '#' }}" alt="Program Image" class="img-thumbnail mb-3" style="max-width: 200px; {{ isset($dataForm) && $dataForm->category_image ? '' : 'display:none;' }}">
                  <input type="file" accept="image/*" class="form-control" id="category_image_file" placeholder="category_image_file" name="category_image_file" value="" onchange="previewImage(event)" {{ $type == 'view' ? 'disabled' : '' }}>
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

  <script src="{{ url('admin/js/pages/programs-category/form.js') }}"></script>
</x-admin-layout>

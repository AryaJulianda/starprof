<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="row">
    <div class="col-md-6 col-xl-12">
      <div class="card">
        <div class="card-body">
          <form id="form-programs" enctype="multipart/form-data" class="needs-validation" action="{{ isset($dataForm) ? url("adm/$module_path/$dataForm->id") : url("adm/$module_path") }}" novalidate>
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
                  <label for="prog_name" class="form-label">Program Name</label>
                  <input type="text" class="form-control" id="prog_name" placeholder="Program Name" name="prog_name" value="{{ isset($dataForm) ? $dataForm->prog_name : '' }}" {{ $type == 'view' ? 'disabled' : 'required' }}>
                </div>
              </div>
              <div class="col-4">
                <div class="mt-3">
                  <label for="prog_category" class="form-label">Program Category</label>
                  <select class="form-select" name="prog_category" id="prog_category" {{ $type == 'view' ? 'disabled' : 'required' }}>
                    <option value="">-- Select Program Category --</option>
                    @foreach ($select_programs_category as $item)
                      <option value="{{ $item->id }}" {{ isset($dataForm) && $item->id == $dataForm->prog_category ? 'selected' : '' }}>{{ $item->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-4">
                <div class="mt-3">
                  <label for="instructor" class="form-label">Instructor</label>
                  <select class="form-select" name="instructor" id="instructor" {{ $type == 'view' ? 'disabled' : 'required' }}>
                    <option value="">-- Select Instructor --</option>
                    @foreach ($select_instructors as $item)
                      <option value="{{ $item->id }}" {{ isset($dataForm) && $item->id == $dataForm->instructor ? 'selected' : '' }}>{{ $item->full_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ isset($dataForm) ? number_format($dataForm->price, 0, ',', '.') : '' }}" {{ $type == 'view' ? 'disabled' : '' }}>
                </div>
              </div>
              {{-- <div class="col-12">
                <div class="mt-3">
                  <input type="checkbox" class="form-check-input" id="popular" placeholder="popular" name="popular" value="1" {{ isset($dataForm) && $dataForm->popular == true ? 'checked' : '' }} {{ $type == 'view' ? 'disabled' : '' }}>
                  <label for="popular" class="form-label">Add to Popular Programs</label>
                </div>
              </div> --}}
              <div class="col-12">
                <div class="mt-3">
                  <label for="prog_image_file" class="form-label d-block">Image</label>
                  <img id="image-preview" src="{{ isset($dataForm) && $dataForm->prog_image ? asset('storage/' . $dataForm->prog_image) : '#' }}" alt="Program Image" class="img-thumbnail mb-3" style="max-width: 200px; {{ isset($dataForm) && $dataForm->prog_image ? '' : 'display:none;' }}">
                  <input type="file" class="form-control" id="prog_image_file" placeholder="prog_image_file" name="prog_image_file" value="" onchange="previewImage(event)" {{ $type == 'view' ? 'disabled' : '' }}>
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var priceInput = document.getElementById('price');

      // Function to format number as currency
      function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split = number_string.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
      }

      // Function to remove format and get pure number
      function removeFormatRupiah(angka) {
        return angka.replace(/[^,\d]/g, '');
      }

      // Format value on load
      if (priceInput.value) {
        priceInput.value = formatRupiah(priceInput.value, 'Rp ');
      }

      priceInput.addEventListener('input', function(e) {
        var value = e.target.value;
        priceInput.value = formatRupiah(value, 'Rp ');
      });

      // On form submit, remove format
      var form = priceInput.closest('form');
      form.addEventListener('submit', function(e) {
        priceInput.value = removeFormatRupiah(priceInput.value);
      });
    });
  </script>

  @if ($type == 'view')
    <script>
      $(document).ready(function() {
        tinymce.EditorManager.execCommand('mceRemoveEditor', true, 'textarea');
      });
    </script>
  @endif
</x-admin-layout>

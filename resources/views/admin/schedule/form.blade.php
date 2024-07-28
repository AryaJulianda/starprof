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
                  <label for="program" class="form-label">Program</label>
                  <select class="form-select" name="program" id="program" {{ $type == 'view' ? 'disabled' : 'required' }}>
                    <option value="">-- Select Program --</option>
                    @foreach ($select_programs as $item)
                      <option value="{{ $item->id }}" {{ isset($dataForm) && $item->id == $dataForm->program ? 'selected' : '' }}>{{ $item->prog_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <div class="w-100" id="datePicker"></div>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="tanggal" class="form-label">Waktu</label>
                  <div class="d-flex flex-row align-items-center" style="gap: 7px;">
                    <span>From</span>
                    <input type="text" name="waktu_from" class="timepicker me-2" style="background-color: transparent;" value="{{ isset($dataFrom) ? $dataFrom->waktu_from : '' }}">
                    <span>To</span>
                    <input type="text" name="waktu_to" class="timepicker" style="background-color: transparent;" value="{{ isset($dataFrom) ? $dataFrom->waktu_to : '' }}">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="lokasi" class="form-label">Lokasi</label>
                  <input type="text" class="form-control" id="lokasi" placeholder="Lokasi" name="lokasi" value="{{ isset($dataForm) ? $dataForm->lokasi : '' }}" {{ $type == 'view' ? 'disabled' : 'required' }}>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="seat_tersisa" class="form-label">Seat Tersisa</label>
                  <input type="number" class="form-control" id="seat_tersisa" placeholder="Seat Tersisa" name="seat_tersisa" value="{{ isset($dataForm) ? $dataForm->seat_tersisa : '' }}" {{ $type == 'view' ? 'disabled' : 'required' }}>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-3">
                  <label for="status_" class="form-label">Status</label>
                  <select class="form-select" name="status" id="status_" {{ $type == 'view' ? 'disabled' : 'required' }}>
                    <option value="">-- Select Status --</option>
                    @foreach ($select_status as $item)
                      <option value="{{ $item->lookup_id }}" {{ isset($dataForm) && $item->lookup_id == $dataForm->status ? 'selected' : '' }}>{{ $item->lookup_value }}</option>
                    @endforeach
                  </select>
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

  <!-- React -->
  <script src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
  <script src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>

  <!-- DatePicker and dependencies-->
  <script src="https://cdn.jsdelivr.net/npm/date-object@latest/dist/umd/date-object.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/react-element-popper@latest/build/browser.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/react-multi-date-picker@latest/build/browser.min.js"></script>

  <!-- Optional Plugin -->
  <script src="https://cdn.jsdelivr.net/npm/react-multi-date-picker@latest/build/date_picker_header.browser.js"></script>

  {{-- Timepicker --}}
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

  <script>
    const {
      DatePicker
    } = ReactMultiDatePicker;

    const rawDates = `{{ isset($dataForm) ? $dataForm->tanggal : '' }}`;
    const dateArray = rawDates.split(', ').map(date => date.trim());
    ReactDOM.render(
      React.createElement(DatePicker, {
        value: dateArray,
        multiple: true,
        inputClass: 'input-tanggal',
        style: {
          width: '400px',
          padding: '10px',
          backgroundColor: 'transparent'
        }
      }),
      document.getElementById("datePicker")
    );

    $(document).ready(function() {
      $('input.timepicker').timepicker({
        timeFormat: 'HH:mm',
        interval: 60,
        minTime: '1',
        maxTime: '6:00pm',
        defaultTime: '09',
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });
    });
  </script>

</x-admin-layout>

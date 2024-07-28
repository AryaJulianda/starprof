<x-admin-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <h4>List Schedule</h4>
            <div class="d-flex" style="gap:5px;">
              <a href="{{ url("adm/$module_path/create") }}" class="btn btn-primary waves-effect btn-label waves-light">
                <i class="bx bx-plus label-icon"></i> Create
              </a>
            </div>
          </div>
          <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
            <thead>
              <tr>
                <th>No</th>
                <th>Program</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Harga</th>
                <th>Lokasi</th>
                <th>Seat Tersisa</th>
                <th>Status</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->

  <script src="{{ url("admin/js/pages/$module_path/index.js") }}"></script>
  <script>
    let asset_path = '{{ asset('storage/') }}';
  </script>
</x-admin-layout>

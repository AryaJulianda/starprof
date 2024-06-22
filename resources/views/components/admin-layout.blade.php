<!doctype html>
<html lang="en" data-bs-theme="dark">

<x-admin-header>
  <x-slot:title>{{ $title }}</x-slot:title>
</x-admin-header>

<body data-sidebar="dark">

  <!-- Begin page -->
  <div id="layout-wrapper">

    <x-admin-topbar></x-admin-topbar>

    <x-admin-sidebar></x-admin-sidebar>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    {{-- <li class="mx-2">/</li> --}}
                    {{-- <li class=""> <a href="#">Dashboards</a> </li> --}}
                  </ol>
                </div>

              </div>
            </div>
          </div>
          <!-- end page title -->

          <main>
            {{ $slot }}
          </main>

        </div>
        <!-- container-fluid -->
      </div>
      <!-- End Page-content -->

      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <script>
                document.write(new Date().getFullYear())
              </script> © Skote.
            </div>
            <div class="col-sm-6">
              <div class="text-sm-end d-none d-sm-block">
                Design & Develop by Themesbrand
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- end main content-->

  </div>
  <!-- END layout-wrapper -->

  <!-- Right Sidebar -->
  <div class="right-bar">
    <div data-simplebar class="h-100">
      <div class="rightbar-title d-flex align-items-center px-3 py-4">

        <h5 class="m-0 me-2">Settings</h5>

        <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
          <i class="mdi mdi-close noti-icon"></i>
        </a>
      </div>

      <!-- Settings -->
      <hr class="mt-0" />
      <h6 class="text-center mb-0">Choose Layouts</h6>

      <div class="p-4">

        <div class="form-check form-switch mb-3">
          <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch">
          <label class="form-check-label" for="light-mode-switch">Light Mode</label>
        </div>

        <div class="form-check form-switch mb-3">
          <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" checked>
          <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
        </div>

      </div>

    </div> <!-- end slimscroll-menu-->
  </div>
  <!-- /Right-bar -->

  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>

  <x-admin-footer></x-admin-footer>

</body>

</html>

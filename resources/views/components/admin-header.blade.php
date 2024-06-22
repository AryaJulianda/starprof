<head>

  <meta charset="utf-8" />
  <title>STARPROF | ADMIN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Technology manufacture industry" name="description" />
  <meta content="TechnoBold" name="author" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ url('admin/images/favicon.ico') }}">
  <!-- Bootstrap Css -->
  <link href="{{ url('admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="{{ url('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="{{ url('admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
  <!-- App js -->
  <script src="{{ url('admin/js/plugin.js') }}"></script>
  <!-- Jquery -->
  <script src="{{ url('admin/libs/jquery/jquery.min.js') }}"></script>
  <!-- Sweet Alert-->
  <link href="{{ url('admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

  {{-- Global Script --}}
  <script>
    var base_url = "{{ url('') }}";
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>
  {{-- End Global Script --}}
</head>

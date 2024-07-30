<head>

  <meta charset="utf-8" />
  <title>STARPROF | ADMIN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Technology manufacture industry" name="description" />
  <meta content="TechnoBold" name="author" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="base-url" content="{{ url('/') }}">

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ url('favicon/favicon.ico') }}">
  <link rel="apple-touch-icon" sizes="57x57" href="{{ url('') }}/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ url('') }}/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ url('') }}/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ url('') }}/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ url('') }}/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ url('') }}/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ url('') }}/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ url('') }}/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ url('') }}/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ url('') }}/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ url('') }}/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ url('') }}/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ url('') }}/favicon/favicon-16x16.png">
  <link rel="manifest" href="{{ url('') }}/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ url('') }}/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

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
  {{-- TinyMCE --}}
  <script src="https://cdn.tiny.cloud/1/eghsnl8p2oercn275e7j4d6yzi3r98af2tv5upjpkm8960bq/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
  {{-- Timepicker --}}
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  {{-- Global Script --}}
  <script>
    var base_url = "{{ url('') }}";

    function getSegmentBeforeAdm() {
      var currentUrl = window.location.href;
      var parser = document.createElement('a');
      parser.href = currentUrl;

      var pathSegments = parser.pathname.split('/').filter(function(segment) {
        return segment.length > 0;
      });

      var admIndex = pathSegments.indexOf('adm');
      if (admIndex !== -1 && admIndex + 1 < pathSegments.length) {
        return pathSegments[admIndex + 1];
      }
      return null;
    }

    var module_path = getSegmentBeforeAdm();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>
  {{-- End Global Script --}}
</head>

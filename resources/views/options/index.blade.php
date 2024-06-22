<!DOCTYPE html>
<html>

<head>
  <title>Manage Options</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">Manage Options</div>
      <div class="card-body">
        @if (session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form id="option-form">
          @csrf
          <div class="form-group">
            <label for="value">Option Value</label>
            <input type="text" class="form-control" name="value" id="value" required>
          </div>
          <button type="submit" class="btn btn-primary">Add Option</button>
        </form>

        <h4 class="mt-4">Options List</h4>
        <ul class="list-group" id="options-list">
          @foreach ($options as $option)
            <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $option->id }}">
              {{ $option->value }}
              <button class="btn btn-danger btn-sm delete-option">Delete</button>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#option-form').submit(function(e) {
        e.preventDefault();
        var value = $('#value').val();
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          url: '{{ route('options.store') }}',
          type: 'POST',
          data: {
            _token: token,
            value: value
          },
          success: function(response) {
            $('#options-list').append('<li class="list-group-item d-flex justify-content-between align-items-center" data-id="' + response.id + '">' + response.value + '<button class="btn btn-danger btn-sm delete-option">Delete</button></li>');
            $('#value').val('');
          }
        });
      });

      $(document).on('click', '.delete-option', function() {
        var id = $(this).parent().data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '{{ route('options.destroy', ':id') }}'.replace(':id', id);
        $.ajax({
          url: url,
          type: 'DELETE',
          data: {
            _token: token
          },
          success: function(response) {
            $('li[data-id="' + id + '"]').remove();
          }
        });
      });
    });
  </script>
</body>

</html>

$(document).ready(function() {
    $('#datatable-carousels').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: `${base_url}/adm/carousels`,
        },
        columns: [
            {
                data: null,
                name: 'no',
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'text_1', name: 'text_1' },
            { data: 'text_2', name: 'text_2' },
            { data: 'created_by', name: 'created_by' },
            { data: 'created_at', name: 'created_at' },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return `
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-dots-vertical-rounded'></i></button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item text-info" href="${base_url}/adm/carousels/${data.id}"><span class="mdi mdi-eye me-2"></span>View</a>
                            <a class="dropdown-item text-warning" href="${base_url}/adm/carousels/${data.id}/edit"><i class='bx bx-pencil me-2'></i>Edit</a>
                            <a class="dropdown-item text-danger delete-button" href="${base_url}/adm/carousels/${data.id}"><i class='bx bx-trash me-2'></i>Delete</a>
                        </div>
                    </div>
                    `;
                }
            }
        ]
    });

    $('#datatable-testimonials').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: `${base_url}/adm/testimonials`,
        },
        columns: [
            {
                data: null,
                name: 'no',
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'name', name: 'name' },
            { data: 'text', name: 'text' },
            { data: 'created_by', name: 'created_by' },
            { data: 'created_at', name: 'created_at' },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return `
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-dots-vertical-rounded'></i></button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item text-info" href="${base_url}/adm/testimonials/${data.id}"><span class="mdi mdi-eye me-2"></span>View</a>
                            <a class="dropdown-item text-warning" href="${base_url}/adm/testimonials/${data.id}/edit"><i class='bx bx-pencil me-2'></i>Edit</a>
                            <a class="dropdown-item text-danger delete-button" href="${base_url}/adm/testimonials/${data.id}"><i class='bx bx-trash me-2'></i>Delete</a>
                        </div>
                    </div>
                    `;
                }
            }
        ]
    });

    $('#datatable-whys').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: `${base_url}/adm/whys`,
        },
        columns: [
            {
                data: null,
                name: 'no',
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'header', name: 'header' },
            { data: 'text', name: 'text' },
            { data: 'created_by', name: 'created_by' },
            { data: 'created_at', name: 'created_at' },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return `
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-dots-vertical-rounded'></i></button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item text-info" href="${base_url}/adm/whys/${data.id}"><span class="mdi mdi-eye me-2"></span>View</a>
                            <a class="dropdown-item text-warning" href="${base_url}/adm/whys/${data.id}/edit"><i class='bx bx-pencil me-2'></i>Edit</a>
                            <a class="dropdown-item text-danger delete-button" href="${base_url}/adm/whys/${data.id}"><i class='bx bx-trash me-2'></i>Delete</a>
                        </div>
                    </div>
                    `;
                }
            }
        ]
    });

    $(document).on('click', '.delete-button', function(event) {
        event.preventDefault();
        var url = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor:"#34c38f",
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url,
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        showAlert('success','Success!', null,() => {
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        showAlert('success','Failed!',null,null);
                    }
                });
            }
        });
    });
});

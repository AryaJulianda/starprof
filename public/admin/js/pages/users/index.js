$(document).ready(function() {
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: `${base_url}/adm/${module_path}`,
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
            { data: 'username', name: 'username' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
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
                            <a class="dropdown-item text-info" href="${base_url}/adm/${module_path}/${data.id}"><span class="mdi mdi-eye me-2"></span>View</a>
                            <a class="dropdown-item text-warning" href="${base_url}/adm/${module_path}/${data.id}/edit"><i class='bx bx-pencil me-2'></i>Edit</a>
                            <a class="dropdown-item text-danger delete-button" href=${base_url}/adm/${module_path}/${data.id}"><i class='bx bx-trash me-2'></i>Delete</a>
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

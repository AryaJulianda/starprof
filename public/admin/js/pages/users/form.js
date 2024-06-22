$(document).ready(function() {
    var form = $('#form-user');

    form.on('submit', function(event) {
        event.preventDefault();

        var url = $(this).attr("action");
        var method = $(this).attr("method");

        let formData = {
            username: $('#username').val(),
            fullname: $('#fullname').val(),
            password: $('#password').val(),
        }

        if (this.checkValidity() === false) {
            event.stopPropagation();
        } else {
            Swal.fire({
                title:"Are you sure?",
                icon:"warning",
                showCancelButton:!0,
                confirmButtonColor:"#34c38f",
                cancelButtonColor:"#f46a6a",
                confirmButtonText:"Yes"
            }).then(function(t){
                if(t.value){
                    showAlert('loading','Loading...',null, null);
                    $.ajax({
                        url,
                        type: method,
                        data: formData,
                        success: function(response) {
                            showAlert('success','Success!',null, () => {
                                window.location.href = `${base_url}/users`;
                            });
                        },
                        error: function(xhr, status, error) {
                            showAlert('error','Failed!',null, null);
                        }
                    });
                }
            })
        }

        form.addClass('was-validated');
    });
});


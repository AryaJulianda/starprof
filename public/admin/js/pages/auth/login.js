$(document).ready(function() {
    var form = $('#form-login');

    form.on('submit', function(event) {
        event.preventDefault();

        var url = $(this).attr("action");
        var method = $(this).attr("method");

        let formData = {
            username: $('#username').val(),
            password: $('#password').val(),
        }

        showAlert('loading','Loading...',null, null);
        $.ajax({
            url,
            type: method,
            data: formData,
            success: function(response) {
                showAlert('success','Success!',null, () => {
                    window.location.href = `${base_url}/adm`;
                });
            },
            error: function(xhr, status, error) {
                event.stopPropagation();

                const errMessage = xhr.responseJSON.message;
                const errStatus = xhr.status;

                if (errStatus === 401) {
                    $('#password').addClass('is-invalid');
                } else if (errStatus === 404) {
                    $('#username').addClass('is-invalid');
                }
                showAlert('error','Failed!',errMessage ,null);
            }
        });
    });
});



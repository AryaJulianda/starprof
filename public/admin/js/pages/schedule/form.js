$(document).ready(function() {
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });

    var form = $('form');

    form.on('submit', function(event) {
        event.preventDefault();

        var url = $(this).attr("action");
        var formData = new FormData(this);

        var tanggal = $('.input-tanggal').val();
        formData.append('tanggal', tanggal);

        console.table(Array.from(formData.entries()));

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
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            showAlert('success','Success!',null, () => {
                                window.location.href = `${base_url}/adm/schedule`;
                            });
                        },
                        error: function(xhr, status, error) {
                            showAlert('error','Failed!',xhr.responseJSON.error, null);
                        }
                    });
                }
            })
        }

        form.addClass('was-validated');
    });
});


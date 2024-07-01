$(document).ready(function() {
    tinymce.init({
        selector: '#text-editor',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });

    var form = $('#form-about-us');

    form.on('submit', function(event) {
        event.preventDefault();

        var url = $(this).attr("action");
        var formData = new FormData(this);
        for (var pair of formData.entries()) {
            console.log(pair[0]+ ': ' + pair[1]);
        }
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
                                window.location.href = `${base_url}/adm/about-us`;
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


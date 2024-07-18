function showAlert(type, title, text, callback) {
    if(type == 'loading'){
        Swal.fire({
            title,
            text,
            showConfirmButton: false,
            showCloseButton: false,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    } else if (type == 'success') {
        Swal.fire({
            title,
            text,
            icon: 'success',
            showConfirmButton: false,
            showCloseButton: false,
            timer: 1000,
            timerProgressBar: true,
            willClose: callback
        });
    } else if (type == 'error') {
        Swal.fire({
            title,
            text,
            icon: 'error',
            showConfirmButton: false,
            showCloseButton: true,
            timerProgressBar: true,
            timer: 5000,
        })
    }
}

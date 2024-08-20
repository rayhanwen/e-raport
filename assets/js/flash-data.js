const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    swal.fire(
        'Success',
        flashData,
        'success'
    )
}

const flashDataError = $('.flash-data-error').data('flashdata-error');

if (flashDataError) {
    swal.fire(
        'Error',
        flashDataError,
        'error'
    )
}

const flashDataWarning = $('.flash-data-warning').data('flashdata-warning');

if (flashDataWarning) {
    swal.fire(
        'Warning',
        flashDataWarning,
        'warning'
    )
}
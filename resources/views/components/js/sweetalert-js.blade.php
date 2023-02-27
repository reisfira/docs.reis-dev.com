$('.swal-delete').on('click', function() {
    Swal.fire({
        title: $(this).data('confirmation'),
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
    }).then( result => {
        if ( result.isConfirmed ) {
            $('.form-delete').trigger('click')
        }
    })
})

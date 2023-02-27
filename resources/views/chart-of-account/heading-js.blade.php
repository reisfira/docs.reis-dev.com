// @ create
$('.btn-new-chart-of-account').on('click', function() {
    let modal = $('.chart-of-account-modal-template').clone().removeClass('chart-of-account-modal-template')

    modal.find('.select2-modal').select2({
        theme: 'bootstrap4',
        width: '100%',
        dropdownAutoWidth: true,
    })

    modal.find('form').attr('action', $(this).data('route'))
    modal.find('input[name=_method]').val($(this).data('method'))

    modal.modal()
    modal.on('hidden.bs.modal', function() { $(this).remove() })
})

// @ edit
$('.chart-of-account-row').on('click', function() {
    $.ajax({ url: $('.sys-params').data('chart-of-account-fetch').replace('ID', $(this).data('id')), method: 'GET' })
    .done( response => {
        console.log(response)

        let modal = $('.chart-of-account-modal-template').clone().removeClass('chart-of-account-modal-template')
        modal.find('.select2-modal').select2({
            theme: 'bootstrap4',
            width: '100%',
            dropdownAutoWidth: true,
        })

        modal.find('form').attr('action', $(this).data('route'))
        modal.find('input[name=_method]').val($(this).data('method'))

        modal.find('.description').val(response.resource.description)
        modal.find('.classification').val(response.resource.classification).trigger('change.select2')
        modal.find('.type').val(response.resource.type).trigger('change.select2')

        if (response.deletable) {
            let deleteUrl = modal.find('.btn-delete').attr('href').replace('ID', response.resource.id)
            modal.find('.delete-section').removeClass('d-none')
            modal.find('.btn-delete').attr('href', deleteUrl)
        }

        modal.modal()
        modal.on('hidden.bs.modal', function() { $(this).remove() })

    }).fail( error => {
        toastr.error("Failed at AJAX")
        console.log(error)
    })
})

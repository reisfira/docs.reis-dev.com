// @ create
$('body').on('click', '.add-sub', function() {
    let modal = $('.sub-chart-of-account-modal-template').clone().removeClass('sub-chart-of-account-modal-template')

    modal.find('.select2-modal').select2({
        theme: 'bootstrap4',
        width: '100%',
        dropdownAutoWidth: true,
    })

    modal.find('.subheading_chart_of_account_code').val($(this).data('chac-code'))
    modal.find('form').attr('action', $('.sys-params').data('chart-of-account-sub-store'))
    modal.find('input[name=_method]').val($(this).data('method'))

    modal.modal()
    modal.on('hidden.bs.modal', function() { $(this).remove() })
})

// @ edit
$('.sub-chart-of-account-row').on('click', function() {
    $.ajax({ url: $('.sys-params').data('chart-of-account-sub-fetch').replace('ID', $(this).data('id')), method: 'GET' })
    .done( response => {
        console.log(response)

        let modal = $('.sub-chart-of-account-modal-template').clone().removeClass('sub-chart-of-account-modal-template')
        modal.find('.select2-modal').select2({
            theme: 'bootstrap4',
            width: '100%',
            dropdownAutoWidth: true,
        })
        console.log($(this).data('route'))
        modal.find('form').attr('action', $(this).data('route'))
        modal.find('input[name=_method]').val($(this).data('method'))

        modal.find('.description').val(response.resource.description)
        modal.find('.subheading_chart_of_account_code').val(response.resource.code)

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

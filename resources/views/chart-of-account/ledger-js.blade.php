// @ create
$('body').on('click', '.add-gl', function() {
    let modal = $('.chart-of-account-ledger-modal-template').clone().removeClass('chart-of-account-ledger-modal-template')

    modal.find('.select2-modal').select2({
        theme: 'bootstrap4',
        width: '100%',
        dropdownAutoWidth: true,
    })

    modal.find('.ledger_chart_of_account_code').val($(this).data('coa-code'))
    modal.find('.ledger_chart_of_account_sub_code').val($(this).data('coa-sub-code'))
    modal.find('form').attr('action', $('.sys-params').data('chart-of-account-ledger-store'))
    modal.find('input[name=_method]').val($(this).data('method'))

    modal.modal()
    modal.on('hidden.bs.modal', function() { $(this).remove() })
})

// @ edit
$('.edit-gl').on('click', function() {
    $.ajax({ url: $('.sys-params').data('general-ledger-fetch').replace('ID', $(this).data('id')), method: 'GET' })
    .done( response => {
        console.log(response)

        let modal = $('.chart-of-account-ledger-modal-template').clone().removeClass('chart-of-account-ledger-modal-template')
        modal.find('.select2-modal').select2({
            theme: 'bootstrap4',
            width: '100%',
            dropdownAutoWidth: true,
        })

        modal.find('form').attr('action', $(this).data('route'))
        modal.find('input[name=_method]').val($(this).data('method'))

        modal.find('.description').val(response.resource.description)
        modal.find('.ccentre_code').val(response.resource.ccentre_code).trigger('change.select2')
        modal.find('.account_code').val(response.resource.account_code)
        modal.find('.opening').val(response.resource.opening)
        modal.find('.last_year_balance').val(response.resource.last_year_balance)

        let deleteUrl = modal.find('.btn-delete').attr('href').replace('ID', response.resource.id)
        modal.find('.delete-section').removeClass('d-none')
        modal.find('.btn-delete').attr('href', deleteUrl)

        modal.modal()
        modal.on('hidden.bs.modal', function() { $(this).remove() })

    }).fail( error => {
        toastr.error("Failed at AJAX")
        console.log(error)
    })
})

// @ ajax edit
$('.save-gl').on('click', function(){
    let currentRow=$(this).closest("tr")
    let ledger_id = currentRow.find('.ledger-id').val()
    let full_code = currentRow.find('.full-code').val() 
    let description = currentRow.find('.description').val() 
    let opening = currentRow.find('.opening').val() 
    let last_year_balance = currentRow.find('.last-year-balance').val() 
    let currency = currentRow.find('.currency').val()
    let data = {
        ledger_id: ledger_id,
        ledger_full_code: full_code,
        ledger_description : description,
        ledger_opening : opening, 
        ledger_last_year_balance : last_year_balance, 
        ledger_currency : currency, 
    }
    $.ajax({ 
        url: $(this).data('route'), 
        data: data,
        method: 'PUT', 
    }).done(function(response) {
        toastr.success('Successfully edited')
        window.location.reload()
    }).fail(function() {
        toastr.error('Failed at to edit')
    })
})
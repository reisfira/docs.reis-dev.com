const fetchInfoRoute = $('.sys-params').data('fetch-opening-info')
let isDebtor = $('.sys-params').data('is-debtor')

$('.dbcr-select').on('change', function() {
    $.ajax({ url: fetchInfoRoute, method: 'POST', data: { account_code: $(this).val() } })
        .done( response => {
            console.log(response)
            $('.doc-no').val(response.next_doc)
            $('.is-debtor').val(response.is_debtor)
            $('.sys-params').attr('is-debtor', response.is_debtor)

            $('.amount, .debit, .credit').val(0)
        }).fail( error => {
            console.log(error)
            toastr.error('Failed')
        })
})

$('.datepicker').on('change', function() {
    let month = moment($(this).val(), 'DD/MM/YYYY').format('MMMM YYYY')
    let accountCode = $('.dbcr-select').val()

    $('.description').val(`OPENING BILL FOR ${accountCode} @ ${month}`)
})

$('.amount').on('keyup change', function() {
    if (isDebtor) {
        $('.debit').val($(this).val())
        $('.credit').val(0)
    } else {
        $('.debit').val(0)
        $('.credit').val($(this).val())
    }
})

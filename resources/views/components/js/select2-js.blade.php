$('.select2').select2({
    theme: 'bootstrap4',
    width: '100%',
    dropdownAutoWidth: true,
})

$('.select2-default').select2({
    theme: 'bootstrap4',
    width: '100%',
    dropdownAutoWidth: true,
})

$('.select2-state-description').select2({
    theme: 'bootstrap4',
    width: '100%',
    dropdownAutoWidth: true,
    templateSelection: function (state) { return `${state.id} - ${state.text}` },
})

$('.select2-state-id').select2({
    theme: 'bootstrap4',
    width: '100%',
    dropdownAutoWidth: true,
    templateSelection: function (state) { return state.id },
})

$('.select2-account-code').select2({
    theme: 'bootstrap4',
    width: '100%',
    dropdownAutoWidth: true,
    templateSelection: function (state) { return state.id },
})

/**
 * Select2 AJAX
 * these are used in invoice and other transactions page, when selecting debtor/tax/item
 * */
$('.select2-debtor-account-code').select2({
    theme: 'bootstrap4',
    width: '100%',
    dropdownAutoWidth: true,
    ajax: {
        url: $('.global-params').data('select2-debtor-account-code-route'),
        method: 'POST',
        data: function (params) { return { search: params.term } },
        processResults: function (data) {
            let searchResults = $.map(data, (item, index) => { return { text: item, id: index } })
            return { results: searchResults };
        }
    }
})

$('.select2-creditor-account-code').select2({
    theme: 'bootstrap4',
    width: '100%',
    dropdownAutoWidth: true,
    ajax: {
        url: $('.global-params').data('select2-creditor-account-code-route'),
        method: 'POST',
        data: function (params) { return { search: params.term } },
        processResults: function (data) {
            let searchResults = $.map(data, (item, index) => { return { text: item, id: index } })
            return { results: searchResults };
        }
    }
})

$('.select2-ledger-account-code').select2({
    theme: 'bootstrap4',
    width: '100%',
    dropdownAutoWidth: true,
    ajax: {
        url: $('.global-params').data('select2-ledger-account-code-route'),
        method: 'POST',
        data: function (params) { return { search: params.term } },
        processResults: function (data) {
            let searchResults = $.map(data, (item, index) => { return { text: item, id: index } })
            return { results: searchResults };
        }
    }
})

$('.select2-item-code').select2({
    theme: 'bootstrap4',
    width: '100%',
    dropdownAutoWidth: true,
    ajax: {
        url: $('.global-params').data('select2-item-code-route'),
        method: 'POST',
        data: function (params) { return { search: params.term } },
        processResults: function (data) {
            let searchResults = $.map(data, (item, index) => { return { text: item, id: index } })
            return { results: searchResults };
        }
    }
})

$('.select2-tax-code').select2({
    theme: 'bootstrap4',
    width: '100%',
    dropdownAutoWidth: true,
    ajax: {
        url: $('.global-params').data('select2-tax-code-route'),
        method: 'POST',
        data: function (params) { return { search: params.term } },
        processResults: function (data) {
            let searchResults = $.map(data, (item, index) => { return { text: item, id: index } })
            return { results: searchResults };
        }
    }
})

$('.select2-payment-method').select2({
    theme: 'bootstrap4',
    width: '100%',
    dropdownAutoWidth: true,
    ajax: {
        url: $('.global-params').data('select2-payment-method-route'),
        method: 'POST',
        data: function (params) { return { search: params.term } },
        processResults: function (data) {
            let searchResults = $.map(data, (item, index) => { return { text: item, id: index } })
            return { results: searchResults };
        }
    }
})

/**
 * Select2 on change handler
 * these are used in invoice and other transactions page, when selecting debtor/tax/item
 * */
$('.select2-debtor-account-code').on('change', function() {
    $.ajax({
        url: $('.global-params').data('debtor-fetch-route'),
        method: 'POST',
        data: { account_code: $(this).val() }
    }).done( response => {
        $('.name').val(response.name)
        $('.addr1').val(response.addr1)
        $('.addr2').val(response.addr2)
        $('.addr3').val(response.addr3)
        $('.addr4').val(response.addr4)
        $('.tel_no').val(response.tel_no)
        $('.fax_no').val(response.fax_no)
        $('.email').val(response.email)
    }).fail( error => {
        console.error('failed')
        toastr.error('failed')
    })
})

$('.select2-creditor-account-code').on('change', function() {
    $.ajax({
        url: $('.global-params').data('creditor-fetch-route'),
        method: 'POST',
        data: { account_code: $(this).val() }
    }).done( response => {
        $('.name').val(response.name)
        $('.addr1').val(response.addr1)
        $('.addr2').val(response.addr2)
        $('.addr3').val(response.addr3)
        $('.addr4').val(response.addr4)
        $('.tel_no').val(response.tel_no)
        $('.fax_no').val(response.fax_no)
        $('.email').val(response.email)
    }).fail( error => {
        console.error('failed')
        toastr.error('failed')
    })
})

$('.select2-ledger-account-code').on('change', function() {
    $.ajax({
        url: $('.global-params').data('ledger-fetch-route'),
        method: 'POST',
        data: { account_code: $(this).val() }
    }).done( response => {
        $('.name').val(response.name)
        $('.addr1').val(response.addr1)
        $('.addr2').val(response.addr2)
        $('.addr3').val(response.addr3)
        $('.addr4').val(response.addr4)
        $('.tel_no').val(response.tel_no)
        $('.fax_no').val(response.fax_no)
        $('.email').val(response.email)
    }).fail( error => {
        console.error('failed')
        toastr.error('failed')
    })
})

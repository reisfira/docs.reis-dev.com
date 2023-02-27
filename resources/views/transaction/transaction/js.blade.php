$('.debit').on('keyup', function(){
    $('.credit').val('')
    let debit_amount = $('.debit').val()
    let tax_rate = $('.tax_rate').val()
    let tax_amount = parseFloat(tax_rate/100 * debit_amount).toFixed(2)
    $('.tax_amount').val(tax_amount)
})

$('.credit').on('keyup', function(){
    $('.debit').val('')
    let credit_amount = $('.credit').val()
    let tax_rate = $('.tax_rate').val()
    let tax_amount = parseFloat(tax_rate/100 * credit_amount).toFixed(2)
    $('.tax_amount').val(tax_amount)
})

$('.select2-tax-code').on('change', function(){
    let tax_code = $('.select2-tax-code').val()
    let route = $('.sys-params').data('fetch-tax-route')
    console.log(route, tax_code)
    $.ajax({
        url: route,
        data: { tax_code:tax_code },
        method: 'POST',

    }).done(function(data) {
        toastr.success('success')
        $('.tax_rate').val(data.rate).change()
        if($('.credit').val() <= 0){
            var amount = $('.debit').val()
            console.log(1)
        }else{
            var amount = $('.credit').val()
            console.log(2)
        }
        let tax_rate = $('.tax_rate').val()
        let tax_amount = parseFloat(tax_rate/100 * amount).toFixed(2)
        $('.tax_amount').val(tax_amount)

    }).fail(function() {
        console.error('failed')
        toastr.error('failed')
    });
})

let clearEntryForm = function(){
    $('.account_code').val('').trigger('change.select2')
    $('.date').val('')
    $('.bill_no').val('')
    $('.description').val('')
    $('.debit').val('')
    $('.credit').val('')
    $('.tax_code').val('').trigger('change.select2')
    $('.tax_rate').val('')
    $('.tax_amount').val('')
}

/**create or update*/
$('.table-ajax-submit').on('click', function(){
    let doc_no = $('.doc_no').val()
    let doc_type = $('.doc_type').val()
    let batch_no = $('.batch_no').val()
    let reference_no = $('.reference_no').val()
    let term = $('.term').val()
    let tax_date = $('.tax_date').val()
    let account_code = $('.account_code').val()
    let date = $('.date').val()
    let bill_no = $('.bill_no').val()
    let description = $('.description').val()
    let debit = $('.debit').val()
    let credit = $('.credit').val()
    let tax_code = $('.tax_code').val()
    let tax_rate = $('.tax_rate').val()
    let tax_amount = $('.tax_amount').val()
    let id = $('.id').val()
    let url = $(this).data('store-route')

    $.ajax({
        url: url,
        data: { 
            id: id,
            doc_no: doc_no,
            doc_type: doc_type,
            batch_no: batch_no,
            reference_no: reference_no,
            term: term,
            tax_date: tax_date,
            account_code: account_code,
            date: date,
            bill_no: bill_no,
            description: description,
            debit: debit,
            credit: credit,
            tax_code: tax_code,
            tax_rate: tax_rate,
            tax_amount: tax_amount,
        },
        method: 'POST',
    }).done(function(data) {
        toastr.success('success')
        console.log(data)

        $('.debit_display').val(data.resource.total_debit)
        $('.credit_display').val(data.resource.total_credit)
        $('.difference').val(data.resource.difference)
        $('#listing-datatable').DataTable().destroy()
        loadTransactionDatatable()
        clearEntryForm()

    }).fail(function() {
        console.error('failed')
        toastr.error('failed')
    });
})

/**datatable */
let loadTransactionDatatable = function(){
    let doc_no = $('.doc_no').val()
    $('#listing-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $('#listing-datatable').data('route'),
            method: 'POST',
            data: { doc_no: doc_no },
        },
        order: [[1, 'desc'], [0, 'desc']],
        columns: [
            { data: 'account_code', name: 'account_code', className: 'text-center small account_code_', },
            { data: 'date_dmy', name: 'date', className: 'text-center small date_' },
            { data: 'bill_no', name: 'bill_no', className: 'text-center small bill_no_' },
            { data: 'description', name: 'description', className: 'small description_' },
            { data: 'debit', name: 'debit', className: 'text-center small debit_' },
            { data: 'credit', name: 'credit', className: 'text-center small credit_' },
            { data: 'tax_code', name: 'tax_code', className: 'text-center small tax_code_' },
            { data: 'tax_rate', name: 'tax_rate', className: 'text-center small tax_rate_' },
            { data: 'tax_amount', name: 'tax_amount', className: 'text-center small tax_amount_' },
            { data: 'tax_amount', name: 'tax_amount', className: 'text-center small', render: (data, type, row) => {
                return `<span class="btn-sm btn-primary retrieve-btn rounded-circle" data-id="${row.id}"><i class="fa-solid fa-angle-down"></i></span>`
            } },
        ],
        initComplete: function () {
            $('#resources-datatable_filter input').unbind();
            $('#resources-datatable_filter input').bind('keyup', function (e) {
                if (e.keyCode == KEYCODE_CARRIAGE_RETURN) contentDatatable.ajax.reload()
            })
        },
    })
}

if($('.sys-params').data('resource-id')!=''){
    let doc_no = $('.sys-params').data('resource-doc-no')
    loadTransactionDatatable(doc_no)
}

/**retrieve */
$('#listing-datatable').on('click', '.retrieve-btn', function(){
    let currentRow=$(this).closest("tr");
    let id = $(this).data('id')
    let account_code = currentRow.find('.account_code_').text()
    let date = currentRow.find('.date_').text()
    let bill_no = currentRow.find('.bill_no_').text()
    let description = currentRow.find('.description_').text()
    let debit = currentRow.find('.debit_').text()
    let credit = currentRow.find('.credit_').text()
    let tax_code = currentRow.find('.tax_code_').text()
    let tax_rate = currentRow.find('.tax_rate_').text()
    let tax_amount = currentRow.find('.tax_amount_').text()

    $('.id').val(id)
    $('.date').val(date)
    $('.bill_no').val(bill_no)
    $('.description').val(description)
    $('.debit').val(debit)
    $('.credit').val(credit)
    $('.tax_code').val(tax_code)
    $('.tax_rate').val(tax_rate)
    $('.tax_amount').val(tax_amount)
    $('.account_code').append(new Option(account_code, account_code))
    $('.account_code').val(account_code).trigger('change.select2')
    
    $('.tax_code').append(new Option(tax_code, tax_code))
    $('.tax_code').val(tax_code).trigger('change.select2')
    
    $('.account_code').focus()
})

$('.doc_no').on('change', function(){
    $('#listing-datatable').DataTable().destroy()
    fetchTransaction()
    loadTransactionDatatable()
})

let fetchTransaction = function(){
    let doc_no = $('.doc_no').val()
    let url = $('.sys-params').data('fetch-transaction-route')
    $.ajax({
        url: url,
        data: { 
            doc_no: doc_no,
        },
        method: 'POST',
    }).done(function(data) {
        toastr.success('success')
        if(data.transaction === null){
            $('.doc_type').val('')
            $('.batch_no').val('')
            $('.reference_no').val('')
            $('.term').val('')
            $('.tax_date').val('')

            $('.debit_display').val(data.total_debit)
            $('.credit_display').val(data.total_credit)
            $('.difference').val(data.difference)
        }else{
            $('.doc_no').val(data.transaction.doc_no)
            $('.doc_type').val(data.transaction.doc_type)
            $('.batch_no').val(data.transaction.batch_no)
            $('.reference_no').val(data.transaction.reference_no)
            $('.term').val(data.transaction.term)
            $('.tax_date').val(data.transaction.tax_date)
            
            $('.debit_display').val(data.total_debit)
            $('.credit_display').val(data.total_credit)
            $('.difference').val(data.difference)
        }

    }).fail(function() {
        console.error('failed')
        toastr.error('failed')
    });
}

/**delete*/
$('.table-ajax-delete').on('click', function(){
    if (confirm('Are you confirm to delete?')) {
        //do if confirm
        
        let doc_no = $('.doc_no').val()
        let id = $('.id').val()
        let url = $(this).data('delete-route')
        $.ajax({
            url: url,
            data: { 
                id: id,
                doc_no: doc_no,
            },
            method: 'POST',
        }).done(function(data) {
            toastr.success('success')
            console.log(data)

            $('.debit_display').val(data.resource.total_debit)
            $('.credit_display').val(data.resource.total_credit)
            $('.difference').val(data.resource.difference)
            $('#listing-datatable').DataTable().destroy()
            loadTransactionDatatable()
            clearEntryForm()

        }).fail(function() {
            console.error('failed')
            toastr.error('Fail to delete')
        });
    } else {
        //do nothing
    }
})

$('.first-document, .previous-document, .next-document, .latest-document').on('click', function(){
    let route = $(this).data('route')
    window.location.replace(route)
})

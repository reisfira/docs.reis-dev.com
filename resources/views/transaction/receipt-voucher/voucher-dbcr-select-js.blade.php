$('#dbcr-account-code').select2({ templateSelection: function (state) { return state.id }, dropdownAutoWidth: true, tags: true })
$('.select2-debtor-account-code').on('change', function () {
    let route = $('.sys-params').data('fetch-bill-item-route')
    let account_code = $('.select2-debtor-account-code').val()
    // remove previous results, then re-add new ones
    let rows = $('#vouchers-table tbody').find('tr').not('.tr-template')
    rows.each(function () { $(this).remove() })

    // trigger AJAX response to populate datatable
    $.ajax({
        url: route,
        data: { account_code: account_code },
        method: 'POST',
        beforeSend: function () { showLoadingModal() }
    }).done(function (response) {
        console.log(response)
        hideLoadingModal()
        $('#currency').val(response.mastercode.currency_code)
        $('#name').val(response.mastercode.name)
        $('#email').val(response.mastercode.email)

        if (response.mastercode.salesman) {
            let salesman = response.mastercode.salesman.split(',')
            $('.collector-code').val(salesman[0]).trigger('change')
        }
        // $('.collector-code').val(response.mastercode.salesman).trigger('change')

        response.bill_item.forEach(function (record) {
            // console.log(record)
            let rowDetailID = 'row-detail-' + record.id
            let template = $('.tr-template').clone().removeClass('tr-template d-none')

            let defaultZeroValue = 0.00
            let billDescription = record.description
            if (!billDescription)
                billDescription = record.doc_no

            // if amount is 0, make the checkbox disabled
            if ($('.amount_mt').val() == 0)
                template.eq(0).find('.item_check').prop('disabled', true)

            template.eq(0).find('.existing_payment').val(false)
            template.eq(0).find('.bill_no').siblings('.displayed-value').text(record.doc_no)
            template.eq(0).find('.bill_no').val(record.doc_no)
            template.eq(0).find('.date').text(record.date_dmy)
            template.eq(0).find('.bill_amount').val(record.amount)
            template.eq(0).find('.bill_amount').siblings('.displayed-value').text(record.amount)
            template.eq(0).find('.description').val(billDescription)
            template.eq(0).find('.paid_amount').val(record.paid_amount)
            template.eq(0).find('.paid_amount').siblings('.displayed-value').text(record.paid_amount)
            template.eq(0).find('.outstanding_amount').val(record.remaining_amount)
            template.eq(0).find('.outstanding_amount').siblings('.displayed-value').text(record.remaining_amount)
            template.eq(0).find('.applied_amount').val(defaultZeroValue)
            template.eq(0).find('.applied_amount').siblings('.displayed-value').text(defaultZeroValue)

            template.eq(0).find('.bill-id').val(record.id)
            template.eq(0).find('.bill-type').val(record.type)
            template.eq(0).find('.bill-dbcr-account').val(record.dbcr_account)
            template.eq(0).find('.bill-original-amount').val(record.original_amount)

            // put in the values to the .applied-amount
            template.eq(0).find('.applied_amount').attr('data-bill-amount', record.amount)
            template.eq(0).find('.applied_amount').attr('data-paid-amount', record.paid_amount)
            template.eq(0).find('.applied_amount').attr('data-outstanding-amount', record.remaining_amount)
            template.eq(0).find('.toggle-details').attr('data-target', '#' + rowDetailID)
            template.eq(1).attr('id', rowDetailID)
            // template.eq(1).find('.details').summernote({
            //     placeholder: '', height: 100, followingToolbar: false,
            //     toolbar: [
            //         ['style', ['bold', 'italic', 'underline', 'clear']],
            //         ['font', ['strikethrough', 'superscript', 'subscript']],
            //         ['color', ['color']],
            //         ['para', ['ul', 'ol']],
            //     ],
            // })
            // append to table
            $('#vouchers-table').find('tbody').append(template)
        })
    }).fail(function () {
        console.log('error at AJAX')
        hideLoadingModal()
    })
})

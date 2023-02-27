let indexDatatable = $('#resources-datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: $('#resources-datatable').data('route'),
        method: 'POST',
        data: function (data) { data.datatable_search = $('#resources-datatable_filter input').val() },
    },
    order: [[1, 'desc'], [0, 'desc']],
    columns: [
        { data: 'doc_no', name: 'doc_no', className: 'text-center small', render: (data, type, row) => {
            let route = $('.sys-params').data('edit-route').replace('id', row.id)
            return `<a href="${route}" target="_blank">${data}</a>`
        } },
        { data: 'date_dmy', name: 'date', className: 'text-center small' },
        { data: 'account_code', name: 'account_code', className: 'text-center small'},
        { data: 'name', name: 'name', className: 'small' },
        { data: 'batch_no', name: 'batch_no', className: 'text-center small' },
        { data: 'discount_amount', name: 'discount_amount', className: 'text-center small' },
        { data: 'amount', name: 'amount', className: 'text-center small' },
        { data: 'tax_amount', name: 'tax_amount', className: 'text-center small' },
        { data: 'grand_total', name: 'grand_total', className: 'text-center small font-weight-bold' },
    ],
    initComplete: function () {
        $('#resources-datatable_filter input').unbind();
        $('#resources-datatable_filter input').bind('keyup', function (e) {
            if (e.keyCode == KEYCODE_CARRIAGE_RETURN) indexDatatable.ajax.reload()
        })
    },
})
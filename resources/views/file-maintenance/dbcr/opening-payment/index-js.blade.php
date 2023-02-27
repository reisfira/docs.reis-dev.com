let indexDatatable = $('#resources-datatable').DataTable({
    processing: true,
    serverSide: true,
    searching: false,
    ajax: {
        url: $('#resources-datatable').data('route'),
        method: 'POST',
        data: function (data) {
            data.context_text_column = $('.datatable-filter').find('.context_text_column').val(),
            data.context_text = $('.datatable-filter').find('.context_text').val(),

            data.left_text_column = $('.datatable-filter').find('.left_text_column').val(),
            data.left_text = $('.datatable-filter').find('.left_text').val()
        },
    },
    order: [[1, 'desc'], [0, 'desc']],
    columns: [
        { data: '_', name: '_', sortable: false, className: 'text-center small pointer', render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1
        } },
        { data: 'doc_no', name: 'doc_no', className: 'text-center small', render: function(data, type, row, meta) {
            let route = $('.sys-params').data('edit-route').replace('id', row.id)
            return `<a href="${route}" target="_blank">${data}</a>`
        }},
        { data: 'date_dmy', name: 'date', className: 'small' },
        { data: 'account_code', name: 'account_code', className: 'small' },
        { data: 'debit', name: 'debit', className: 'small' },
        { data: 'credit', name: 'credit', className: 'small' },
    ],
})

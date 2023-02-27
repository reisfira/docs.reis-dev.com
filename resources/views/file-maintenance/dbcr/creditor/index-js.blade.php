// to add datatable here later
$('#accounts-datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: $('#accounts-datatable').data('route'),
        method: 'POST',
        data: function (data) { data.datatable_search = $('#accounts-datatable_filter input').val() },
    },
    order: [[1, 'desc'], [0, 'desc']],
    columns: [
        { data: '_', name: '_', sortable: false, className: 'text-center small pointer', render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1
        } },
        { data: 'full_code', name: 'full_code', className: 'text-center small', render: function(data, type, row, meta) {
            let route = $('.sys-params').data('edit-route').replace('id', row.id)
            return `<a href="${route}" target="_blank">${data}</a>`
        }},
        { data: 'name', name: 'name', className: 'small' },
        { data: 'tel_no', name: 'tel_no', className: 'small' },
        { data: 'fax_no', name: 'fax_no', className: 'small' },
        { data: 'email', name: 'email', className: 'small' },
        { data: 'currency_code', name: 'currency_code', className: 'small' },
        { data: 'opening', name: 'opening', className: 'small' },
    ],
    initComplete: function () {
        $('#accounts-datatable_filter input').unbind();
        $('#accounts-datatable_filter input').bind('keyup', function (e) {
            if (e.keyCode == KEYCODE_CARRIAGE_RETURN) indexDatatable.ajax.reload()
        })
    },
})

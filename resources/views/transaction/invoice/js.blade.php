$('#listing-datatable').DataTable({
    processing: true,
    serverSide: true,
    ordering: false,
    ajax: {
        url: $('#listing-datatable').data('route'),
        method: 'POST',
        data: function (data) { data.datatable_search = $('#listing-datatable_filter input').val() },
    },
    columns: [
        {
            data: 'sequence_no', name: 'sequence_no', sortable: false, className: 'text-center small pointer', render: function (data, type, row, meta) {
                return row.sequence_no ?? meta.row + meta.settings._iDisplayStart + 1
            }
        },
        { data: 'account_code', name: 'account_code', className: 'text-center small pointer' },
        { data: 'description', name: 'description', className: 'small pointer' },
        { data: 'quantity', name: 'quantity', className: 'text-center small pointer', render: function (data) { return parsingDecimal(data) } },
        { data: 'uom', name: 'uom', className: 'text-center small pointer' },
        { data: 'unit_price', name: 'unit_price', className: 'text-center small pointer' },
        { data: 'discount', name: 'discount', className: 'text-center small pointer' },
        { data: 'amount', name: 'amount', className: 'text-center small pointer font-weight-bold' },
        { data: 'tax_amount', name: 'tax_amount', className: 'text-center small pointer' },
        { data: 'subtotal', name: 'subtotal', className: 'text-center small pointer font-weight-bold' },
        {
            data: null, className: 'text-center align-middle small pointer', sortable: false, render: function (data, type, row, meta) {
                let html = `
                <div class="toggle-details data-edit-resource pointer" data-id="${row.id}">
                    <span class="fa-stack" style="vertical-align: top;">
                        <i class="fas fa-circle fa-stack-2x" style="color: Dodgerblue;"></i>
                        <i class="fas fa-angle-down fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                `
                return html
            }
        },
    ],
    initComplete: function () {
        $('#listing-datatable_filter input').unbind();
        $('#listing-datatable_filter input').bind('keyup', function (e) {
            if (e.keyCode == KEYCODE_CARRIAGE_RETURN) contentDatatable.ajax.reload()
        })
    },
})

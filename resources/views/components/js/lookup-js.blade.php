$('body').on('click', '.lookup-by-js', function () {
    let modal = $('.search-modal-template').clone().removeClass('search-modal-template')
    let table = modal.find('.search-table')

    // these are to define the context if required to pass data from the lookup into an input field
    let target = $(this).data('target')
    let context = $(this).data('context')
    let $context = $('body').find(context)

    // sometimes we require more than 1 return
    let targets = $(this).data('targets')
    let targets_array = $(this).data('targets').split(',')
    let target_references = $(this).data('target-references').split(',')

    // these are dynamic headings fetched from the text-w-label-lookup (dataColumns[]), to populate the th of the table
    let headings = $(this).data('headings').split(',')
    headings.forEach(function (heading) {
        table.find('.table-heading').append(`<th>${heading}</th>`)
    })

    // these are dynamic columns fetched from the text-w-label-lookup (dataColumns[]), which is used in initializing the datatable
    let columns = []
    $(this).data('columns').split(',').forEach(function (column, index) {
        let data = { data: column, name: column, className: (index == 0) ? `identifier pointer ${column}` : `pointer ${column}` }
        columns.push(data)
    })

    // parameter to pass to the datatables query
    let data = {
        doc_columns: $(this).data('columns'),
        doc_table: $(this).data('table'),
    }

    // normally, we'd send just columns and table for the datatable to work. but sometimes, 1 data can be passed to search the query based on this parameter
    // for example: when lookup tool_serials in tool bookings module, we want to fetch only tool_serial where tool_code equals to the selected tool_code
    // and that is when we actually use searchValue and searchColumn, other times it will just be empty string ('') and does nothing
    let searchColumns = $(this).data('search-columns').split(',')
    let searchInputs = $(this).data('search-inputs').includes(',') ? $(this).data('search-inputs').split(',') : [$(this).data('search-inputs')]
    console.log(searchInputs)
    if (searchInputs) {
        searchColumns.map((column, index) => {
            if ($context.find(searchInputs[index]).val()) {
                // console.log(`found element ${searchInputs[index]}`)
                data[column] = $context.find(searchInputs[index]).hasClass('is-toggle')
                    ? $context.find(searchInputs[index]).prop('checked')
                    : $context.find(searchInputs[index]).val()
            } else {
                // console.log(`default to static value ${searchInputs[index]}`)
                data[column] = searchInputs[index]
            }
        })
    }
    // console.log(data)

    // lastly, this url is the AJAX url.. normally we point to route('api.lookup.simple') but, we can pass in other url too like datatable route in their own controllers
    // need to becareful though in case the passed parameters above will conflict with the existing implementations of the datatable. so far tested, its ok.
    let url = $(this).data('url')

    table.DataTable({
        processing: true,
        serverSide: true,
        ajax: { url: url, data: data, method: 'POST' },
        order: [[0, "desc"]],
        columns: columns,
    })

    /**
     * on double click the first column, pass back the value to the context form inputs
     * two cases:
     *  1. single input : if setup using 'target' => '.input'
     *    - on double click the first column, put the value into the input field as defined in the $context and target then close this lookup modal
     *
     *  2. multiple input : if setup using 'dataTargets' => ['.context-input' => '.table-col-class-assigned-from-datatable']
     *    - on double click the first column, fetch multiple inputs based on our 'targets' and 'target_references' array
     *    - we first check this condition, if the array is empty or contains 1 empty string, then revert back to the 1st method
     * */
    table.on('dblclick', 'td:not(th)', function () {
        let row = $(this).parents('tr')
        if (targets) {
            // if satisfy the 2nd condition, return multiple inputs
            target_references.forEach(function (reference, index) {
                $context.find(targets_array[index]).val(row.find(reference).text())
            })
        } else {
            // default is the 1st condition
            $context.find(target).val(row.find('.identifier').text()).trigger('change')
        }
        modal.modal('hide')
    })

    modal.modal()
    modal.on('hidden.bs.modal', function (e) { $(this).remove() })
})

$('body').on('click', '.lookup-stock-by-js', function () {
    let modal = $('.search-modal-template').clone().removeClass('search-modal-template')
    let table = modal.find('.search-table')

    // these are to define the context if required to pass data from the lookup into an input field
    let target = $(this).data('target')
    let context = $(this).data('context')
    let $context = $('body').find(context)

    // sometimes we require more than 1 return
    let targets = $(this).data('targets')
    let targets_array = $(this).data('targets').split(',')
    let target_references = $(this).data('target-references').split(',')

    // these are dynamic headings fetched from the text-w-label-lookup (dataColumns[]), to populate the th of the table
    let headings = $(this).data('headings').split(',')
    headings.forEach(function (heading) {
        table.find('.table-heading').append(`<th>${heading}</th>`)
    })

    // these are dynamic columns fetched from the text-w-label-lookup (dataColumns[]), which is used in initializing the datatable
    let columns = []
    $(this).data('columns').split(',').forEach(function (column, index) {
        let data = { data: column, name: column, className: (index == 0) ? `identifier pointer ${column}` : `pointer ${column}` }
        columns.push(data)
    })

    // parameter to pass to the datatables query
    let data = {
        doc_columns: $(this).data('columns'),
        doc_table: $(this).data('table'),
    }
    console.log(data)
    let url = $(this).data('url') // lookup.simple.master
    table.DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: { url: url, data: data, method: 'POST' },
        columns: [
            {
                data: 'thumbnail', name: 'thumbnail', className: 'text-center', render: function (data, type, row, meta) {
                    return row.image
                        ? `<img src="${data}" height="50px" width="100px" style="height: auto; max-height: 50px; max-width: 100%; position: relative; width: auto;">`
                        : `<img src="${row.default_image}" height="50px" width="100px" style="height: auto; max-height: 50px; max-width: 100%; position: relative; width: auto;">`;
                }
            },
            { data: 'code', name: 'code', className: 'identifier' },
            {
                data: 'name', name: 'name', render: function (data, type, row, meta) {
                    let packing = row.packing ? `<br><i class="small"> ${row.packing} </i>` : ''
                    return `${row.name} ${packing}`;
                }
            },
            { data: 'unit_cost', name: 'unit_cost', className: 'text-center' },
            { data: 'balance', name: 'balance', className: 'text-center' },
            { data: 'uom_1', name: 'uom_1', className: 'text-center' },
        ],
    })

    table.on('dblclick', 'td:not(th)', function () {
        let row = $(this).parents('tr')

        $context.find(target).val(row.find('.identifier').text()).trigger('change')
        modal.modal('hide')
    })

    modal.modal()
    modal.on('hidden.bs.modal', function (e) { $(this).remove() })
})

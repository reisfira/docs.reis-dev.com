$('body').on('click', '.lookup-by-js', function () {
    let modal = $('.search-modal-template').clone().removeClass('search-modal-template')
    let table = modal.find('.search-table')

    // these are to define the context if required to pass data from the lookup into an input field
    let target = $(this).data('target')
    let context = $(this).data('context')
    let $context = $('body').find(context)
    if(target == '.range-bill-no-from'){
        modal.find('.left_text_column').append(new Option("Doc No", "doc_no"), new Option('Account Code', 'account_code'))
        modal.find('.context_text_column').append(new Option("Doc No", "doc_no"), new Option('Account Code', 'account_code'))
    }else{
        modal.find('.left_text_column').append(new Option("Code", "full_code"), new Option('Name', 'name'))
        modal.find('.context_text_column').append(new Option("Code", "full_code"), new Option('Name', 'name'))
    }

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
            if(target == '.range-bill-no-from'){
                $('.entry-form-table').find('.debit').val(row.find('.grand_total').text())
            }else{
                console.log($('body').find('.doc_no').val())
                console.log(row.find('.type').text())
                
                if(row.find('.type').text() == 'GL'){
                    $('.entry-form-table').find('.bill_no').val('')
                    
                }else{
                    $('.entry-form-table').find('.bill_no').val($('body').find('.doc_no').val())

                }
            }
            console.log($context.find(target), target, row.find('.identifier').text())
            $('.entry-form-table').find(target).val(row.find('.identifier').text())
            $context.find(target).val(row.find('.identifier').text()).trigger('change')
        }
        modal.modal('hide')
    })

    modal.on('click', '.search-btn', function(){
        let left_text = modal.find('.left_text').val()
        let left_text_column = modal.find('.left_text_column').val()
        let context_text = modal.find('.context_text').val()
        let context_text_column = modal.find('.context_text_column').val()
        data['left_text'] = left_text
        data['left_text_column'] = left_text_column
        data['context_text'] = context_text
        data['context_text_column'] = context_text_column

        table.DataTable().destroy()
        table.DataTable({
            processing: true,
            serverSide: true,
            ajax: { url: url, data: data, method: 'POST' },
            order: [[0, "desc"]],
            columns: columns,
        })

    })

    modal.modal()
    modal.on('hidden.bs.modal', function (e) { $(this).remove() })
})

let target_table = function(){
    let doc_type = $('.doc_type').val()
    if(doc_type == 'CB'){
        doc_type = 'acc_cbmt'
    }else if(doc_type == 'INV'){
        doc_type = 'acc_invmt'
    }else{

    }
    $('.bill_no_td').children().find('.lookup-by-js').data('table', doc_type)
    console.log($('.bill_no_td').children().find('.lookup-by-js').data('table'))
    console.log(doc_type)
}

$('.doc_type').on('change', function(){
    target_table()
})

target_table()

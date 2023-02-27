/**Calculation */
let calculatePrice = function(){
    let price = $('.unit-price').val()
    let quantity = $('.quantity').val()
    let tax_amount = $('.tax-amount').val()
    let discount = $('.discount').val()
    let uom_rate = $('.uom-rate').val()
    let discount_rate = $('.discount-rate').val()
    let tax_rate = $('.tax-rate').val()
    let amount= 0
    let subtotal= 0
    let unit_price = parseFloat(price * quantity * uom_rate).toFixed(2)
    amount = parseFloat(unit_price - discount).toFixed(2)
    // amount = parseFloat((price * quantity) - discount).toFixed(2)
    subtotal = parseFloat(amount) + parseFloat(tax_amount)

    $('.amount').val(amount)
    $('.subtotal').val(subtotal)
}

let calculateRate = function(){
    let price = $('.unit-price').val()
    let quantity = $('.quantity').val()
    let amount = $('.amount').val()
    let tax_amount = $('.tax-amount').val()
    let discount = $('.discount').val()
    let uom_rate = $('.uom-rate').val()
    let discount_rate = $('.discount-rate').val()
    let tax_rate = $('.tax-rate').val()
    let unit_price = parseFloat(price * quantity * uom_rate).toFixed(2)

    //if discount_rate != null then calculate discount_rate else (discount = discount)
    discount = (discount_rate > 0)?parseFloat(unit_price * ((discount_rate)/100)).toFixed(2):discount
    amount = parseFloat(unit_price - discount).toFixed(2)
    $('.discount').val(discount).change()

    //if tax_rate != null then calculate tax_rate else (tax = tax)
    tax_amount = (tax_rate > 0)?parseFloat(amount * ((tax_rate)/100)).toFixed(2):tax_amount
    subtotal = parseFloat(amount) + parseFloat(tax_amount)
    $('.tax-amount').val(tax_amount).change()
    console.log(tax_amount, tax_rate)

    $('.amount').val(amount)
    $('.subtotal').val(subtotal)
}

$('.uom-rate, .discount-rate, .tax-rate').on('keyup change', function(){
    calculateRate()
})

$('.discount, .quantity, .unit-price, .tax-amount').on('keyup change', function(){
    calculatePrice()
})

/**Save Entry Form */
$('.save-btn').on('click', function(){
    let unit_price = $('.unit-price').val()
    let quantity = $('.quantity').val()
    let tax_amount = $('.tax-amount').val()
    let discount = $('.discount').val()
    let description = $('.description').val()
    let sequence_no = $('.sequence-no').val()
    let uom = $('.uom').val()
    let uom_rate = $('.uom-rate').val()
    let discount_rate = $('.discount-rate').val()
    let tax_rate = $('.tax-rate').val()
    let amount = $('.amount').val()
    let subtotal = $('.subtotal').val()
    let id = $('.save-btn').data('id')
    let invoice_item_id = $('.invoice_item_id').val()
    let account_code = $('.account-code').val()
    let discount_type = $('.discount-type').val()
    let tax_code = $('.tax_code').val()
    let item_code = $('.item_code').val()
    let details = $('.details').val()
    let url = $('.save-btn').data('route').replace('ID', id)

    $.ajax({
        url: url,
        data: { 
            account_code: account_code,
            unit_price: unit_price,
            quantity: quantity,
            tax_amount: tax_amount,
            discount: discount,
            description: description,
            sequence_no: sequence_no,
            uom: uom,
            uom_rate: uom_rate,
            discount_rate: discount_rate,
            tax_rate: tax_rate,
            amount: amount,
            subtotal: subtotal,
            invoice_item_id: invoice_item_id,
            discount_type: discount_type,
            tax_code: tax_code,
            item_code: item_code,
            details: details,
        },
        method: 'POST',
    }).done(function(data) {
        toastr.success('success')
        console.log(data)
        $('.grand_total').text()
        $('.discount').text()
        $('.tax_amount').text()
        $('.amount').text()

        $('.grand_total').text(parseFloat(data.resource.grand_total).toFixed(2))
        $('.discount').text(parseFloat(data.resource.discount_amount).toFixed(2))
        $('.tax_amount').text(parseFloat(data.resource.tax_amount).toFixed(2))
        $('.amount').text(parseFloat(data.resource.grand_total - data.resource.tax_amount).toFixed(2))
        $('#listing-datatable').DataTable().ajax.reload()
        clearEntryForm()

    }).fail(function() {
        console.error('failed')
        toastr.error('failed')
    });
})

let clearEntryForm = function(){
    $('.unit-price').val('')
    $('.quantity').val('')
    $('.tax-amount').val('')
    $('.discount').val('')
    $('.description').val('')
    $('.sequence-no').val('')
    $('.uom').val('')
    $('.uom-rate').val('')
    $('.discount-rate').val('')
    $('.tax-rate').val('')
    $('.amount').val('')
    $('.subtotal').val('')
    $('.invoice_item_id').val('')
    $('.account-code').val('')
    $('.discount-type').val('')
    $('.tax_code').val('').trigger('change')
    $('.item_code').val('').trigger('change')
    $('.details').val('')
}

/**retrieve */
$('#listing-datatable').on('click', '.data-edit-resource', function(e){
    let currentRow= $(e.target).closest('tr');
    let id = $(this).data('id')
    let url = $('.sys-params').data('fetch-invoice-item-route').replace('ID', id)
    $.ajax({
        url: url,
        data: {},
        method: 'GET',
    }).done(function(data) {
        console.log(data)
        toastr.success('success')
        $('.unit-price').val(data.invoice_item.unit_price)
        $('.quantity').val(data.invoice_item.quantity)
        $('.tax-amount').val(data.invoice_item.tax_amount)
        $('.discount').val(data.invoice_item.discount)
        $('.description').val(data.invoice_item.description)
        $('.sequence-no').val(data.invoice_item.sequence_no)
        $('.uom').val(data.invoice_item.uom)
        $('.uom-rate').val(data.invoice_item.uom_rate)
        $('.discount-rate').val(data.invoice_item.discount_rate)
        $('.tax-rate').val(data.invoice_item.tax_rate)
        $('.amount').val(data.invoice_item.amount)
        $('.subtotal').val(data.invoice_item.subtotal)
        $('.invoice_item_id').val(data.invoice_item.id)
        $('.account-code').val(data.invoice_item.account_code)
        $('.discount-type').val(data.invoice_item.discount_type)
        $('.tax-code').val(data.invoice_item.tax_code)
        $('.details').val(data.invoice_item.details)
        $('.item_code').append(new Option(data.item_details.details, data.item_details.code))
        $('.item_code').val(data.invoice_item.item_code).trigger('change.select2')
        
        $('.tax_code').append(new Option(data.invoice_item.tax_code, data.invoice_item.tax_code))
        $('.tax_code').val(data.invoice_item.tax_code).trigger('change.select2')


    }).fail(function() {
        console.error('failed')
        toastr.error('failed')
    });
})

$('.select2-item-code').on('change', function(){
    let item_code = $('.select2-item-code').val()
    let route = $('.sys-params').data('fetch-item-route')
    console.log(route, item_code)
    $.ajax({
        url: route,
        data: { item_code:item_code },
        method: 'POST',

    }).done(function(data) {
        console.log(data)
        toastr.success('success')
        $('.account-code').val(data.account_credit_sales)
        $('.unit-price').val(data.price)
        $('.details').val(data.detail)
        $('.uom').val(data.uom)
        $('.uom-rate').val(1)

    }).fail(function() {
        console.error('failed')
        toastr.error('failed')
    });
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
        $('.tax-rate').val(data.rate).change()

    }).fail(function() {
        console.error('failed')
        toastr.error('failed')
    });
})

$('.btn-delete').on('click', function(){
    if (confirm('Are you sure to delete?')) {
        //do if confirm
        
        let invoice_item_id = $('.invoice_item_id').val()
        let dt_id = $('.dt-id').val() //inv_mt id
        let route = $(this).data('delete-url').replace('id', dt_id)
        $.ajax({
            url: route,
            data: { invoice_item_id:invoice_item_id },
            method: 'POST',

        }).done(function(data) {
            toastr.success('success')
            $('.grand_total').text()
            $('.discount').text()
            $('.tax_amount').text()
            $('.amount').text()

            $('.grand_total').text(parseFloat(data.resource.grand_total).toFixed(2))
            $('.discount').text(parseFloat(data.resource.discount_amount).toFixed(2))
            $('.tax_amount').text(parseFloat(data.resource.tax_amount).toFixed(2))
            $('.amount').text(parseFloat(data.resource.grand_total - data.resource.tax_amount).toFixed(2))
            $('#listing-datatable').DataTable().ajax.reload()
            clearEntryForm()

        }).fail(function() {
            console.error('failed')
            toastr.error('failed')
        });
    } else {
        //do nothing
    }
})
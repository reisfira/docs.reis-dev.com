/**
 * The left fillable input is for amount
 * the remaining will always initialize with the amount value, because later, when the table gets created,
 * the remaining amount will be deducted against the total applied amount (in <tfoot>)
 * */
let amount = parsingDecimal($('.amount_mt').val() || 0)
let remainingAmount = amount

let calculateTotals = function () {
    let totalBillAmount = 0
    let totalPaidAmount = 0
    let totalOutstandingAmount = 0
    let totalAppliedAmount = 0

    // loop through each amounts
    $('.bill_amount').each(function () { totalBillAmount = parsingDecimal(totalBillAmount) + parsingDecimal($(this).val()) })
    $('.paid_amount').each(function () { totalPaidAmount = parsingDecimal(totalPaidAmount) + parsingDecimal($(this).val()) })
    $('.outstanding_amount').each(function () { totalOutstandingAmount = parsingDecimal(totalOutstandingAmount) + parsingDecimal($(this).val()) })
    $('.applied_amount').each(function () { totalAppliedAmount = parsingDecimal(totalAppliedAmount) + parsingDecimal($(this).val()) })

    // update the view (the td in tfoot)
    $('.total-bill-amount').text(totalBillAmount.toFixed(2))
    $('.total-paid-amount').text(totalPaidAmount.toFixed(2))
    $('.total-outstanding-amount').text(totalOutstandingAmount.toFixed(2))
    $('.total-applied-amount').text(totalAppliedAmount.toFixed(2))

    // keep updating the remaining_amount based on the current applied total
    bankCharges = parsingDecimal($('.bank_charges').val())
    remainingAmount = parsingDecimal($('.remaining_amount_mt').data('original-amount')) - totalAppliedAmount

    $('.remaining_amount_mt').val(remainingAmount.toFixed(2))
}

$('.remaining_amount_mt').val(remainingAmount.toFixed(2)).attr('data-original-amount', remainingAmount.toFixed(2))
$('.amount_mt').on('change keyup', function () {
    amount = $(this).val()
    remainingAmount = parsingDecimal($(this).val())
    $('.remaining_amount_mt')
        .val(remainingAmount.toFixed(2))
        .data('original-amount', remainingAmount.toFixed(2))

    $('.btn-submit').prop('disabled', amount == 0 ? true : false)
    $('.item_check').prop('disabled', amount == 0 ? true : false)
})

$('tbody').on('change', '.item_check', function () {
    let row = $(this).parents('tr')

    if ($(this).prop('checked')) {
        $(this).siblings('.is_checked').val('true')
        minusCalculateFields(row)
    } else {
        $(this).siblings('.is_checked').val('false')
        plusCalculateFields(row)
    }

    calculateTotals()

}).on('change keyup', '.applied_amount', function () {
    let row = $(this).parents('tr')
    let originalPaidAmount = parsingDecimal($(this).data('paid-amount').toString())
    let originalOutstandingAmount = parsingDecimal($(this).data('outstanding-amount').toString())

    let appliedAmount = parsingDecimal($(this).val())
    let paidAmount = originalPaidAmount + appliedAmount
    let outstandingAmount = originalOutstandingAmount - appliedAmount

    row.find('.item_check').prop('checked', appliedAmount > 0 ? true : false)
    row.find('.item_check').siblings('.is_checked').val(appliedAmount > 0 ? 'true' : 'false')

    row.find('.outstanding_amount').val(outstandingAmount.toFixed(2))
    row.find('.outstanding_amount').siblings('.displayed-value').text(outstandingAmount.toFixed(2))

    row.find('.paid_amount').val(paidAmount.toFixed(2))
    row.find('.paid_amount').siblings('.displayed-value').text(paidAmount.toFixed(2))

    calculateTotals()
})

let minusCalculateFields = function (row) {
    if (remainingAmount >= 0) {

        let outstanding = parsingDecimal(row.find('.outstanding_amount').val())
        let appliedAmount = (remainingAmount >= outstanding) ? outstanding : remainingAmount

        row.find('.applied_amount').val(appliedAmount.toFixed(2))
        row.find('.applied_amount').siblings('.displayed-value').text(appliedAmount.toFixed(2))

        let outstandingAmount = parsingDecimal(row.find('.outstanding_amount').val()) - appliedAmount
        row.find('.outstanding_amount').val(outstandingAmount.toFixed(2))
        row.find('.outstanding_amount').siblings('.displayed-value').text(outstandingAmount.toFixed(2))

        let paidAmount = parsingDecimal(row.find('.paid_amount').val()) + appliedAmount
        row.find('.paid_amount').val(paidAmount.toFixed(2))
        row.find('.paid_amount').siblings('.displayed-value').text(paidAmount.toFixed(2))
    }
}

let plusCalculateFields = function (row) {
    let appliedAmount = parsingDecimal(row.find('.applied_amount').val())

    let outstandingAmount = parsingDecimal(row.find('.outstanding_amount').val()) + appliedAmount
    row.find('.outstanding_amount').val(outstandingAmount.toFixed(2))
    row.find('.outstanding_amount').siblings('.displayed-value').text(outstandingAmount.toFixed(2))

    let paidAmount = parsingDecimal(row.find('.paid_amount').val()) - appliedAmount
    row.find('.paid_amount').val(paidAmount.toFixed(2))
    row.find('.paid_amount').siblings('.displayed-value').text(paidAmount.toFixed(2))

    row.find('.applied_amount').val(0)
    row.find('.applied_amount').siblings('.displayed-value').text(0)
}

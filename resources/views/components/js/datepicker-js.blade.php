/**
 * .daterangepicker uses https://github.com/dangrossman/daterangepicker library
 * demo/code-generator: http://www.daterangepicker.com/
 * code obtained from: node_modules\admin-lte\plugins\daterangepicker\daterangepicker.js
 * */
$('.datetimepicker').daterangepicker({
    singleDatePicker: true,
    timePicker: true,
    timePicker24Hour: true,
    timePickerIncrement: 5,
    linkedCalendars: false,
    showCustomRangeLabel: false,
    minYear: 2000,
    maxYear: parseInt(moment().format('YYYY'), 10),
    drops: 'auto',
    autoUpdateInput: false,
    locale: {
        format: 'DD/MM/YYYY HH:mm',
        cancelLabel: 'Clear',
    },
})

// the following line is required to apply changes to datetimerangepicker if autoUpdateInput is set to false
$('.datetimepicker').on('apply.daterangepicker', function (ev, picker) {
    const momentFormat = 'DD/MM/YYYY HH:mm'
    $(this).val(picker.startDate.format(momentFormat))
}).on('cancel.daterangepicker', function (ev, picker) { $(this).val('') })

/**
 * .datepicker uses uxsolutions library
 * demo/code-generator: https://uxsolutions.github.io/bootstrap-datepicker
 * */
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true,
}).on('keydown', function (e) { e.preventDefault() })

$('.datepicker-term').datepicker({
    format: 'mm/yyyy',
    minViewMode: 1, // select month
    maxViewMode: 2, // select year
    autoclose: true,
})

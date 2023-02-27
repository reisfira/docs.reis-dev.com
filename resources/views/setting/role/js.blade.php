$('.btn-group-toggle').on('click', function() {
    let groupRow = $(this).parents('tr')
    groupRow.find('.permission-checkbox').prop('checked', !groupRow.find('.permission-checkbox').prop('checked'))
})

$('.btn-toggle-all').on('click', function() {
    $('.permission-checkbox').prop('checked', !$('.permission-checkbox').prop('checked'))
})

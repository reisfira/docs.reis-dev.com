// to format the tax
function formatStateInTable(state) { return state.id }

$('.report').on('click', function () {
    let modal = $('.report-modal-template').clone().removeClass('report-modal-template').addClass('reporting-modal-form').css('overflow-y', 'auto')
    let formTitle = $(this).data('form-title')
    let formClass = $(this).data('form-class')
    let form = $(formClass).clone().removeClass('transactions-template')

    modal.find('.form').html(form)
    modal.find('.report-title').html(formTitle)

    // sometimes there is a hidden input passed from the data-* attribute
    // currently specifically used to print selected barcode from stocks masterfile
    let hiddenValue = $(this).data('hidden-input-value')
    modal.find('.hidden-input-value').val(hiddenValue)

    /** initializing JS objects */
    // view modes: ( 1 = select month ; 2 = select year)
    modal.find('.money').inputmask('currency', { prefix: '', rightAlign: true, removeMaskOnSubmit: true, autounmask: true })
    modal.find('.taxcode-select2').select2({ templateSelection: formatStateInTable, dropdownAutoWidth: true })
    modal.find('.uninit-bs4-toggle').bootstrapToggle({ 'on': 'Yes', 'off': 'No', 'onstyle': 'success', 'offstyle': 'secondary', })
    modal.find('.uninitialized-select2').select2({ theme: 'bootstrap4', width: '100%', dropdownAutoWidth: true, })
    modal.find('.uninitialized-datepicker').datepicker({ format: 'dd/mm/yyyy', autoclose: true, highlightToday: true, }).inputmask('99/99/9999')
    modal.find('.uninitialized-termpicker').datepicker({ format: 'mm/yyyy', minViewMode: 1, maxViewMode: 2, autoclose: true, }).inputmask('99/9999')

    // assign id to input
    $.each(modal.find('.input-radio'), function() {
        $(this).attr('id', $(this).data('id'))
    })

    /** on initialize modal, do ajax do fetch date */
    $.get($('.sys-params').data('date-route'))
        .done(function (response) {
            modal.find('.date-from').datepicker('setDate', response.date_from)
            modal.find('.date-to').datepicker('setDate', response.date_to)
            modal.find('.term').datepicker('setDate', response.term)
            modal.find('.date-as-at').datepicker('setDate', response.date_as_at)
        }).fail(function () {
            toastr.error('Error fetching date data. Please contact administrator')
        })

    /**
     * bind input checks
     * if checkbox is checked, then enable the inputs
     * and send a hidden boolean value to indicate whether to search through the selected range or not
     * */
    modal.find('.input-check').on('ifToggled', function (e) {
        let parent = $(this).parents('.inputs-container')
        let is_checked = $(this).prop('checked')

        parent.find('.input-checked-field').prop('disabled', !is_checked)
        parent.find('.input-use-search').val(is_checked)
        parent.find('.radio-label').toggleClass('text-muted')
        parent.find('.input-hint').toggleClass('d-none')
    })

    /**
     * bind "from" selection on change to match in "to"
     * */
    modal.find('.modal-input-from').on('change', function () {
        let container = $(this).parents('.inputs-container')
        container.find('.modal-input-to').val($(this).val())
    })

    /**
     * checks if more than 1 selected groups are the same, disable the button and show the error
     * allow up to 3 groupings and each groups must be different from each other; they are initialized to null
     * */
    let grouping = { 1: null, 2: null, 3: null }
    modal.find('.groups').on('change', function () {
        grouping[$(this).data('group')] = $(this).val()
        let checkMoreThanOneGroupsAreSelected = (grouping[1] && grouping[2]) || (grouping[2] && grouping[3]) || (grouping[1] && grouping[3])
        let checkMoreTHanOneGroupsAreSimilar = (grouping[1] == grouping[2] || grouping[1] == grouping[3] || grouping[2] == grouping[3])

        if (checkMoreThanOneGroupsAreSelected && checkMoreTHanOneGroupsAreSimilar)
            toastr.error('Cannot have two same groups')

        // enable/disable button based on the combined condition
        modal.find('.btn-submit').prop('disabled', checkMoreThanOneGroupsAreSelected && checkMoreTHanOneGroupsAreSimilar)
    })

    modal.modal()
    modal.on('hidden.bs.modal', function (e) { $(this).remove() })
})

/**
 * this is also used in index pages to show the print button by listing/summary
 * the url should be decided based on the selected mode (summary or listing) then only allow to submit,
 * so on changed selection, means the print route also change
 * */
$('body').on('click', '.btn-submit', function () {
    let form = $(this).parents('.printout-form')
    if (form) {
        let printURL = form.find('.print_type:checked').data('route')
        form.attr('action', printURL)
    }
})

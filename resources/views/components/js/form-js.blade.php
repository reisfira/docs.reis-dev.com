const KEYCODE_CARRIAGE_RETURN = 13

// ajax setup
$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
})

// prevent form submit on press enter, and instead, trigger the next input if have
$('form').on('keydown', 'input', function (event) {
    if (event.keyCode == KEYCODE_CARRIAGE_RETURN) {
        event.preventDefault();
    }
})

// prepare inputmask classes for quick use on non-dynamic modules
$('.inputmask-money').inputmask('currency', {
    prefix: '',
    rightAlign: true,
    removeMaskOnSubmit: true,
    autounmask: true
})

$('.inputmask-date').inputmask('99/99/9999')    // dd/mm/yyyy   - e.g.: 07/08/1995
$('.inputmask-term').inputmask('99/9999')       // mm/yyyy      - e.g.: 08/1995

// default inputmask decimal
$('.inputmask-decimal').inputmask('decimal', {
    placeholder: "0",
    clearMaskOnLostFocus: false
})

// default inputmask number
$('.inputmask-number').inputmask('decimal', {
    integerDigits: 5,
    digits: 2,
    digitsOptional: false,
    placeholder: "0",
    clearMaskOnLostFocus: false
})

$('.inputmask-number-left').inputmask('decimal', {
    integerDigits: 5,
    digits: 2,
    digitsOptional: false,
    placeholder: "0",
    rightAlign: false,
})

// specific decimal according to the settings
$('.inputmask-decimal-0').inputmask('decimal', {
    integerDigits: 10,
    digits: 0,
    digitsOptional: false,
    placeholder: "0",
    clearMaskOnLostFocus: false
})

$('.inputmask-decimal-1').inputmask('decimal', {
    integerDigits: 10,
    digits: 1,
    digitsOptional: false,
    placeholder: "0",
    clearMaskOnLostFocus: false
})

$('.inputmask-decimal-2').inputmask('decimal', {
    integerDigits: 10,
    digits: 2,
    digitsOptional: false,
    placeholder: "0",
    clearMaskOnLostFocus: false
})

$('.inputmask-decimal-3').inputmask('decimal', {
    integerDigits: 10,
    digits: 3,
    digitsOptional: false,
    placeholder: "0",
    clearMaskOnLostFocus: false
})

$('.inputmask-decimal-4').inputmask('decimal', {
    integerDigits: 10,
    digits: 4,
    digitsOptional: false,
    placeholder: "0",
    clearMaskOnLostFocus: false
})

$('.inputmask-decimal-5').inputmask('decimal', {
    integerDigits: 10,
    digits: 5,
    digitsOptional: false,
    placeholder: "0",
    clearMaskOnLostFocus: false
})

$('.inputmask-account-code').inputmask('99999-99')
$('.inputmask-alphanumeric-allcaps').inputmask('*****', { casing: 'upper', placeholder: '' })
$('.inputmask-alphanumeric-allcaps-30').inputmask('******************************', { casing: 'upper', placeholder: '' })

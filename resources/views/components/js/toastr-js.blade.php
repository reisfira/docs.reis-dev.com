toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

@if (Session::has('toast-success'))
    toastr.success('{{ Session::get('toast-success') }}')
@endif

@if (Session::has('toast-info'))
    toastr.info('{{ Session::get('toast-info') }}')
@endif

@if (Session::has('toast-warning'))
    toastr.warning('{{ Session::get('toast-warning') }}')
@endif

@if (Session::has('toast-error'))
    toastr.error('{{ Session::get('toast-error') }}')
@endif

@if (count($errors) > 0)
@foreach ($errors->all() as $error)
    toastr.error('{{ $error }}')
@endforeach
@endif

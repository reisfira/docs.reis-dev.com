@php
    /**
     * unless specified by 'types', passed as parameter, by default show all options available
     *  - otherwise show only available types
     * */
    $print_formats = config('kusimi.print-formats');
    if (isset($types)) {
        $print_formats = array_filter($print_formats, function($format) use ($types) {
            return in_array($format['value'], $types);
        });
    }
@endphp

<div class="{{ $template_class ?? 'index-print' }}">
    {!! Form::open(['url' => $route, 'method' => 'POST', 'target' => '_blank']) !!}

    @include('components.form.reporting.radios', [
        'name' => 'print_type',
        'label' => 'Print Type',
        'options' => $print_formats,
    ])

    @include('components.form.reporting.submit')

    {!! Form::close() !!}
</div>

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

    $dbcr_types = [
        [
            'id' => 'dbcr-type-both',
            'label' => 'Both',
            'value' => 'both',
            'checked' => true,
        ],[
            'id' => 'dbcr-type-trade',
            'label' => 'Trade Debtor',
            'value' => '1',
            'checked' => false,
        ],[
            'id' => 'dbcr-type-other',
            'label' => 'Other Debtor',
            'value' => '0',
            'checked' => false,
        ]
    ];

    $order_types = [
        [
            'id' => 'order-by-account-code',
            'label' => 'A/C Code',
            'value' => 'account_code',
            'checked' => true,
        ],[
            'id' => 'order-by-marked-account-code',
            'label' => 'Marked + A/C Code',
            'value' => 'marked',
            'checked' => false,
        ]
    ];

@endphp

<div class="{{ $template_class ?? 'index-print' }}">
    {!! Form::open(['url' => $route, 'method' => 'POST', 'target' => '_blank']) !!}

        @include('components.form.reporting.radios', [
            'name' => 'print_type',
            'label' => 'Print Type',
            'options' => $print_formats,
        ])

        @include('components.form.reporting.radios', [
            'name' => 'type',
            'label' => 'Type',
            'options' => $dbcr_types,
        ])

        @include('components.form.reporting.radios', [
            'name' => 'order_by',
            'label' => 'Order By',
            'options' => $order_types,
        ])

        @include('components.form.reporting.range', [
            'label' => 'Account Code',
            'name' => 'account_code',
            'table' => 'debtor',
            'columns' => [
                'full_code' => 'A/C Code',
                'name' => 'Name',
                'tel_no' => 'Tel No.',
                'fax_no' => 'Fax No',
                'hp_no' => 'H/P No.',
            ],
            'lookup_class' => 'lookup-by-js',
            'lookup_url' => route('utilities.lookup.datatable'),
            'bold' => true,
        ])

        @include('components.form.reporting.range', [
            'label' => 'Cost Code',
            'name' => 'ccentre_code',
            'table' => 'cost_centre',
            'columns' => [
                'code' => 'Cost Centre',
                'description' => 'Description',
            ],
            'lookup_class' => 'lookup-by-js',
            'lookup_url' => route('utilities.lookup.datatable'),
            'bold' => true,
        ])

        @include('components.form.reporting.submit')

    {!! Form::close() !!}
</div>

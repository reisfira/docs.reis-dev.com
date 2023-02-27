<div class="form-group row inputs-container">
    <div class="col-3">
        @include('components.form.general.checkbox', ['name' => 'account_code_check', 'checked' => true, 'form_class' => 'input-check' ])
        {!! Form::hidden('search_account_code', true, ['class' => 'input-use-search']) !!}
        {!! Form::label('range_account_code', isset($label) ? $label : 'Account Code', ['class' => 'col-form-label pl-2']) !!}
    </div>
    <div class="col-4">
        @include('components.form.general.text-w-lookup', [
            'name' => 'range_account_code_from',
            'form_class' => 'input-checked-field range-account-code-from modal-input-from input-from',
            'lookup_class' => 'lookup-by-js',
            'context' => $context ?? '.reporting-modal-form',
            'target' => '.range-account-code-from',
            'dataTable' => $table,
            'dataUrl' => route('api.lookup.simple.master'),
            'dataColumns' => [
                'account_code' => 'Code',
                'name' => 'Name',
            ],
        ])
    </div>
    <div class="col-4">
        @include('components.form.general.text-w-lookup', [
            'name' => 'range_account_code_to',
            'form_class' => 'input-checked-field range-account-code-to modal-input-to input-to',
            'lookup_class' => 'lookup-by-js',
            'context' => $context ?? '.reporting-modal-form',
            'target' => '.range-account-code-to',
            'dataTable' => $table,
            'dataUrl' => route('api.lookup.simple.master'),
            'dataColumns' => [
                'account_code' => 'Code',
                'name' => 'Name',
            ],
        ])
    </div>
</div>
<div class="card card-primary">
    <div class="card-header pointer">FORM</div>
    <div class="card-body">
        @include('components.form.general.text-w-label', [ 'name' => 'code', 'label' => 'Code', 'is_required' => true ])
        @include('components.form.general.select2-w-label', [ 'name' => 'type', 'label' => 'Type', 'array' => config('kusimi.tax-types'), 'remove_placeholder' => true ])
        @include('components.form.general.text-w-label', [ 'name' => 'description', 'label' => 'Description' ])
        @include('components.form.general.select2-w-label', [ 'name' => 'account_code', 'label' => 'Account Code', 'array' => $general_ledgers, 'remove_placeholder' => true ])
        @include('components.form.general.text-w-label', [ 'name' => 'rate', 'label' => 'Rate', 'form_class' => 'inputmask-number-left' ])
        @include('components.form.general.text-w-label', [ 'name' => 'category', 'label' => 'Category' ])
        @include('components.form.general.select2-w-label', [ 'name' => 'transaction_type', 'label' => 'Trn. Type', 'array' => $trn_types, 'remove_placeholder' => true ])
        @include('components.form.general.select2-w-label', [ 'name' => 'tariff_code', 'label' => 'Tariff Code', 'array' => $tariff_codes ])
        @include('components.form.reporting.radios', [
            'name' => 'active',
            'label' => 'Active',
            'apply_id' => true,
            'options' => [
                [
                    'id' => 'active-yes',
                    'label' => 'Yes',
                    'value' => true,
                    'checked' => true,
                ],[
                    'id' => 'active-no',
                    'label' => 'No',
                    'value' => false,
                    'checked' => false,
                ]
            ],
        ])
    </div>
</div>

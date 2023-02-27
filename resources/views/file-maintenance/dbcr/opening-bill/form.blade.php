<div class="card card-primary">
    <div class="card-header pointer">FORM</div>
    <div class="card-body">
        <div class="form-group row">
            {!! Form::label('account_code', 'Account Code', ['class' => 'col-sm-3 col-form-label font-weight-normal']) !!}
            <div class="col-sm-8">
                @include('components.form.general.select2', [
                    'name' => 'account_code',
                    'select2class' => 'select2-debtor-account-code dbcr-select',
                    'placeholder' => 'Please select an account code ',
                    'is_required' => true,
                    'array' => isset($set_account_code) ? [ $set_account_code => $set_account_code ] : [],
                    'dbcr_type' => 'debtor',  // dbcr_type: debtor | creditor | ledger
                    'value' => $set_account_code ?? null,  // if view on edit page, this should help set default value when select2 has no array
                ])
            </div>
        </div>
        {!! Form::hidden('is_debtor', null, ['class' => 'is-debtor']) !!}

        @include('components.form.general.text-w-label', [ 'name' => 'doc_no', 'label' => 'Doc No', 'form_class' => 'doc-no', 'readonly_input' => true ])
        @include('components.form.general.date-w-label', [ 'name' => 'date_dmy', 'label' => 'Date', 'required' => true ])
        @include('components.form.general.text-w-label', [ 'name' => 'description', 'label' => 'Description' ])

        @include('components.form.general.text-w-label', [ 'name' => 'amount', 'label' => 'Amount', 'form_class' => 'amount inputmask-number-left' ])
        @include('components.form.general.text-w-label', [ 'name' => 'debit', 'label' => 'Debit', 'form_class' => 'debit inputmask-number-left', 'readonly_input' => true ])
        @include('components.form.general.text-w-label', [ 'name' => 'credit', 'label' => 'Credit', 'form_class' => 'credit inputmask-number-left', 'readonly_input' => true ])
    </div>
</div>

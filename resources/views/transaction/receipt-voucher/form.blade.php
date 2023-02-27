<div class="card card-primary">
    <div class="card-header pointer">FORM</div>
    <div class="card-body">
        <div class="row col-12">
            <div class="col-6">
                <div class="form-group row">
                    <div class="col-md-3 mb-1">
                        @include('components.form.general.select2', [
                            'name' => 'account_code',
                            'select2class' => 'select2-debtor-account-code dbcr-select',
                            'placeholder' => 'A/C Code',
                            'is_required' => true,
                            'array' => isset($set_account_code) ? [ $set_account_code => $set_account_code ] : [],
                            'dbcr_type' => 'debtor',  // dbcr_type: debtor | creditor | ledger
                            'value' => $set_account_code ?? null,  // if view on edit page, this should help set default value when select2 has no array
                            ])
                    </div>
                    
                    <div class="col-md-8">
                        @include('components.form.general.text-w-append', [ 'name' => 'name', 'append_class' => 'btn-dbcr-search', 'placeholder' => 'Name ' ])
                    </div>
                </div>
                @include('components.form.general.text-w-label', [ 'name' => 'bank_charges_acc', 'label' => 'Bank Charges Acc', 'form_class' => 'doc_type', 'value' => isset($resource->doc_type)?$resource->doc_type:'' ])
                <div class="form-group row">
                    {!! Form::label('', 'Payment Method', ['class' => "col-sm-3 col-form-label font-weight-normal" ]) !!}
                    <div class="col-sm-8">
                        @include('components.form.general.select2', [
                            'name' => 'payment_method',
                            'select2class' => 'select2-payment-method dbcr-select',
                            'placeholder' => '-',
                            'is_required' => true,
                            'array' => isset($set_payment_method) ? [ $set_payment_method => $set_payment_method ] : [],
                            'dbcr_type' => 'debtor',  // dbcr_type: debtor | creditor | ledger
                            'value' => $set_payment_method ?? null,  // if view on edit page, this should help set default value when select2 has no array
                            ])
                    </div>
                </div>
                @include('components.form.general.text-w-label', [ 'name' => 'cheque_no', 'label' => 'Cheque No' ])
                @include('components.form.general.text-w-label', [ 'name' => 'cheque_date', 'label' => 'Cheque Date' ])
                @include('components.form.general.text-w-label', [ 'name' => 'reference_no', 'label' => 'Reference No' ])
                
            </div>
            <div class="col-6">
                @include('components.form.special.doc-no', [ 'name' => 'doc_no', 'label' => 'Document No.', 'narrow_gutter' => true ])
                @include('components.form.general.date-w-label', [ 'name' => 'date', 'label' => 'Date', 'value' => isset($resource->tax_date)?$resource->tax_date_dmy:'' ])
                @include('components.form.general.text-w-label', [ 'name' => 'currency', 'label' => 'Currency' ])
                @include('components.form.general.text-w-label', [ 'name' => 'receive_amount', 'form_class' => 'amount_mt inputmask-decimal-2 text-right', 'label' => 'Rec. Amount' ])
                @include('components.form.general.text-w-label', [ 'name' => 'remaining', 'form_class' => 'remaining_amount_mt inputmask-decimal-2 text-right', 'label' => 'Remaining' ])
                @include('components.form.general.text-w-label', [ 'name' => 'bank_charges', 'form_class' => 'bank_charges inputmask-decimal-2 text-right', 'label' => 'Bank Charges' ])
                @include('components.form.general.text-w-label', [ 'name' => 'foreign_gain_loss', 'form_class' => 'foreign_gain_loss inputmask-decimal-2 text-right', 'label' => 'Foreign Gain/Loss' ])

            </div>
        </div>
        
        {!! Form::hidden('id', null, ['class' => 'id']) !!}
    </div>
</div>

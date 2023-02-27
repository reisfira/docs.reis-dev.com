<div class="card card-primary">
    <div class="card-header pointer">FORM</div>
    <div class="card-body">
        @include('components.form.general.text-w-label', [ 'name' => 'code', 'label' => 'Code', 'form_class' => 'code inputmask-alphanumeric-allcaps-30', 'is_required' => true, ])
        @include('components.form.general.text-w-label', [ 'name' => 'description', 'label' => 'Description', 'is_required' => true, ])
        @include('components.form.general.textarea-w-label', [ 'name' => 'detail', 'label' => 'Detail' ])

        @include('components.form.general.text-w-label', [ 'name' => 'uom', 'label' => 'UOM', 'is_required' => true, ])
        @include('components.form.general.text-w-label', [ 'name' => 'cost', 'label' => 'Cost', 'form_class' => 'cost inputmask-number-left', 'is_required' => true, ])
        @include('components.form.general.text-w-label', [ 'name' => 'price', 'label' => 'Price', 'form_class' => 'price inputmask-number-left', 'is_required' => true, ])

        <div class="form-group row">
            <div class="col-3"></div>
            <div class="col-4 text-center">DEBIT</div>
            <div class="col-4 text-center">CREDIT</div>
        </div>

        <div class="form-group row">
            <div class="col-3">Cash Bill</div>
            <div class="col-4 text-center">
                @include('components.form.general.select2', ['name' => 'account_cash_sales', 'array' => $general_ledgers ?? [] ])
            </div>
            <div class="col-4 text-center">
                @include('components.form.general.select2', ['name' => 'account_cash_sales_return', 'array' => $general_ledgers ?? [] ])
            </div>
        </div>


        <div class="form-group row">
            <div class="col-3">Invoice</div>
            <div class="col-4 text-center">
                @include('components.form.general.select2', ['name' => 'account_credit_sales', 'array' => $general_ledgers ?? [] ])
            </div>
            <div class="col-4 text-center">
                @include('components.form.general.select2', ['name' => 'account_credit_sales_return', 'array' => $general_ledgers ?? [] ])
            </div>
        </div>


        <div class="form-group row">
            <div class="col-3">Cash Purchase</div>
            <div class="col-4 text-center">
                @include('components.form.general.select2', ['name' => 'account_cash_purchase', 'array' => $general_ledgers ?? [] ])
            </div>
            <div class="col-4 text-center">
                @include('components.form.general.select2', ['name' => 'account_cash_purchase_return', 'array' => $general_ledgers ?? [] ])
            </div>
        </div>


        <div class="form-group row">
            <div class="col-3">Supplier Invoice</div>
            <div class="col-4 text-center">
                @include('components.form.general.select2', ['name' => 'account_credit_purchase', 'array' => $general_ledgers ?? [] ])
            </div>
            <div class="col-4 text-center">
                @include('components.form.general.select2', ['name' => 'account_credit_purchase_return', 'array' => $general_ledgers ?? [] ])
            </div>
        </div>
    </div>
</div>

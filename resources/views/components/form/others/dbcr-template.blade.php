<div class="row">
    <div class="col-md-4 mb-1">
        @include('components.form.general.select2', [
            'name' => 'full_code',
            'select2class' => 'select2-debtor-account-code',
            'placeholder' => 'Please select an account code ',
            'is_required' => true,
            'array' => isset($set_account_code) ? [ $set_account_code => $set_account_code ] : [],
            'dbcr_type' => $dbcr_type,  // dbcr_type: debtor | creditor | ledger
            'value' => $set_account_code ?? null,  // if view on edit page, this should help set default value when select2 has no array
        ])
    </div>

    <div class="col-md-8">
        @include('components.form.general.text-w-append', [ 'name' => 'name', 'append_class' => 'btn-dbcr-search', 'placeholder' => 'Name ' ])
    </div>
    <div class="col-md-12">
        @include('components.form.general.text', [ 'name' => 'addr1', 'narrow_gutter' => true, 'placeholder' => 'Address 1 ' ])
        @include('components.form.general.text', [ 'name' => 'addr2', 'narrow_gutter' => true, 'placeholder' => 'Address 2 ' ])
        @include('components.form.general.text', [ 'name' => 'addr3', 'narrow_gutter' => true, 'placeholder' => 'Address 3 ' ])
        @include('components.form.general.text', [ 'name' => 'addr4', 'narrow_gutter' => true, 'placeholder' => 'Address 4 ' ])
    </div>

    <div class="col-md-6 hideable-section show">
        @include('components.form.general.text-w-append', [ 'name' => 'tel_no', 'narrow_gutter' => true, 'fa_class' => 'fas fa-phone', 'placeholder' => 'Tel No. ' ])
    </div>
    <div class="col-md-6 hideable-section show">
        @include('components.form.general.text-w-append', [ 'name' => 'fax_no', 'narrow_gutter' => true, 'fa_class' => 'fas fa-print', 'placeholder' => 'Fax No. ' ])
    </div>
    <div class="col-md-12 hideable-section show">
        @include('components.form.general.text-w-append', [ 'name' => 'email', 'narrow_gutter' => true, 'fa_class' => 'fas fa-envelope', 'placeholder' => 'Email ' ])
    </div>
</div>
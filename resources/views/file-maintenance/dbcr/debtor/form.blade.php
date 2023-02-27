<div class="card card-primary">
    <div class="card-header">
        FORM
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <strong class="font-weight-bold small">ACCOUNT INFO</strong>
                @include('components.form.special.account-code', [ 'name' => 'account_code', 'label' => 'Acc. Code', 'narrow_gutter' => true, 'is_required' => true, 'readonly_input' => isset($resource) ])
                @include('components.form.general.select2-w-label', [ 'name' => 'ccentre_code', 'label' => 'Cost Centre', 'narrow_gutter' => true, 'is_required' => true, 'array' => $cost_centre_codes ])
                @include('components.form.general.text-w-label', [ 'name' => 'name', 'label' => 'Name', 'narrow_gutter' => true, 'is_required' => true ])

                <div class="mt-3"></div>
                <strong class="font-weight-bold small">ACCOUNT DETAILS</strong>
                @include('components.form.general.text-w-label', [ 'name' => 'addr1', 'label' => 'Address 1', 'narrow_gutter' => true, 'is_required' => true ])
                @include('components.form.general.text-w-label', [ 'name' => 'addr2', 'label' => 'Address 2', 'narrow_gutter' => true ])
                @include('components.form.general.text-w-label', [ 'name' => 'addr3', 'label' => 'Address 3', 'narrow_gutter' => true ])
                @include('components.form.general.text-w-label', [ 'name' => 'addr4', 'label' => 'Address 4', 'narrow_gutter' => true ])

                @include('components.form.general.text-w-icon-append', [ 'name' => 'tel_no', 'label' => 'Tel No.', 'narrow_gutter' => true, 'fa_class' => 'fas fa-phone' ])
                @include('components.form.general.text-w-icon-append', [ 'name' => 'fax_no', 'label' => 'Fax No.', 'narrow_gutter' => true, 'fa_class' => 'fas fa-print' ])
                @include('components.form.general.text-w-icon-append', [ 'name' => 'hp_no', 'label' => 'H/P No.', 'narrow_gutter' => true, 'fa_class' => 'fas fa-mobile' ])
                @include('components.form.general.text-w-icon-append', [ 'name' => 'email', 'label' => 'Email', 'narrow_gutter' => true, 'fa_class' => 'fas fa-envelope' ])
                @include('components.form.general.textarea-w-label', [ 'name' => 'memo', 'label' => 'Memo/Remark', 'narrow_gutter' => true, 'row_count' => 5 ])

            </div>
            <div class="col-6">
                <strong class="font-weight-bold small">CREDIT INFO</strong>
                @include('components.form.general.text-w-label', [ 'name' => 'credit_term', 'label' => 'Credit Term', 'narrow_gutter' => true, 'is_required' => true ])
                @include('components.form.general.text-w-label', [ 'name' => 'credit_limit', 'label' => 'Credit Limit', 'narrow_gutter' => true, 'is_required' => true, 'form_class' => 'inputmask-number-left' ])

                <div class="mt-3"></div>
                <strong class="font-weight-bold small">AREA/SALESMAN</strong>
                @include('components.form.general.select2-w-label', [ 'name' => 'area_code', 'label' => 'Area', 'narrow_gutter' => true, 'array' => $area_codes ])
                @include('components.form.general.select2-w-label', [ 'name' => 'salesman_code', 'label' => 'Salesman', 'narrow_gutter' => true, 'array' => $salesman_codes ])
                @include('components.form.general.text-w-label', [ 'name' => 'contact_person', 'label' => 'Contact Person / PIC', 'narrow_gutter' => true ])
                @include('components.form.general.text-w-label', [ 'name' => 'contact_person_tel_no', 'label' => 'PIC Tel No.', 'narrow_gutter' => true ])
                @include('components.form.general.text-w-label', [ 'name' => 'contact_person_position', 'label' => 'PIC Position', 'narrow_gutter' => true ])

                <div class="mt-3"></div>
                <strong class="font-weight-bold small">BUSINESS INFO</strong>
                @include('components.form.general.text-w-label', [ 'name' => 'brn_no', 'label' => 'BRN No.', 'narrow_gutter' => true ])
                @include('components.form.general.text-w-label', [ 'name' => 'gst_no', 'label' => 'GST No.', 'narrow_gutter' => true ])
                @include('components.form.general.select2-w-label', [ 'name' => 'gst_code', 'label' => 'GST Code', 'narrow_gutter' => true, 'array' => $tax_codes ])
                @include('components.form.general.date-w-label', [ 'name' => 'gst_vdate_dmy', 'label' => 'GST V.Date', 'narrow_gutter' => true ])
                @include('components.form.general.select2-w-label', [ 'name' => 'currency_code', 'label' => 'Currency', 'narrow_gutter' => true, 'array' => $currency_codes ])

                <div class="mt-3"></div>
                <strong class="font-weight-bold small clearfix">OPTIONS</strong>
                @include('components.form.general.checkbox', [ 'name' => 'is_trade_account', 'label' => 'Trade Debtor', 'checked' => isset($resource) ? $resource->is_trade_account : true ])
                @include('components.form.general.checkbox', [ 'name' => 'generate_interest', 'label' => 'Generate Interest', 'checked' => isset($resource) ? $resource->generate_interest : false ])
                @include('components.form.general.checkbox', [ 'name' => 'email_state_of_account', 'label' => 'Email Statement', 'checked' => isset($resource) ? $resource->email_state_of_account : false ])

            </div>
        </div>
    </div>
</div>

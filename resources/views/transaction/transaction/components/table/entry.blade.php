<tbody>
    <tr>
        <td class="p-0">
            @include('components.form.general.text-w-lookup', [
                'name' => 'account_code',
                'form_class' => 'input-checked-field modal-input modal-input-from input-from range-model-from account_code',
                'lookup_class' => 'lookup-by-js',
                'context' => '.range-model-from',
                'target' => '.range-model-from',
                'dataTable' => 'view_mastercodes',
                'dataUrl' => $lookupUrl ?? route('ultility.lookup.account-code'),
                'dataColumns' => [ 'full_code' => 'Account Code', 'type' => 'Type', 'name' => 'Name' ],
            ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'date', 'form_class' => 'date datepicker' ])
        </td>
        <td class="p-0 bill_no_td">
            @include('components.form.general.text-w-lookup', [
                'name' => 'bill_no',
                'form_class' => 'input-checked-field modal-input modal-input-from input-from range-bill-no-from bill_no',
                'lookup_class' => 'lookup-by-js',
                'context' => '.range-bill-no-from',
                'target' => '.range-bill-no-from',
                'dataTable' => 'acc_invmt',
                'dataUrl' => $lookupUrl ?? route('ultility.lookup.bill-no'),
                'dataColumns' => [ 'doc_no' => 'Doc No', 'account_code' => 'Account Code', 'name' => 'Name', 'grand_total' => 'Grand Total' ],
            ])
            {{-- @include('components.form.table.text', [ 'name' => 'bill_no', 'form_class' => 'bill_no' ]) --}}
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'description', 'form_class' => 'description' ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'debit', 'form_class' => 'debit inputmask-decimal-2 text-center' ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'credit', 'form_class' => 'credit inputmask-decimal-2 text-center' ])
        </td>
        <td class="p-0">
            @include('components.form.general.select2', [
                'name' => 'tax_code',
                'select2class' => 'select2-tax-code',
                'placeholder' => 'Tax Code ',
                'is_required' => true,
                'array' => isset($set_tax_code) ? [ $set_tax_code => $set_tax_code ] : [],
                'value' => $set_tax_code ?? null,  // if view on edit page, this should help set default value when select2 has no array
            ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'tax_rate', 'form_class' => 'tax_rate inputmask-decimal-2 text-center' ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'tax_amount', 'form_class' => 'tax_amount inputmask-decimal-2 text-center' ])
        </td>
        <td>
            <div class="pointer form-group mb-0" data-toggle="popover">
            <span class="fa-stack table-ajax-submit" data-store-route="{{ route('transaction.transaction.save-content') }}" style="vertical-align: top;">
                <i class="fas fa-circle fa-stack-2x" style="color: DodgerBlue;"></i>
                <i class="fas fa-arrow-right fa-stack-1x fa-inverse"></i>
            </span>
            <span class="fa-stack table-ajax-delete" data-delete-route="{{ route('transaction.transaction.delete-content') }}" style="vertical-align: top;">
                <i class="fas fa-circle fa-stack-2x" style="color: Red;"></i>
                <i class="fas fa-times fa-stack-1x fa-inverse"></i>
            </span>
            </div>
        </td>
    </tr>
</tbody>
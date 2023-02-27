<tbody>
    <tr>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'sequence_no', 'form_class' => 'sequence-no text-center', 'value' => '0000' ])
            {!! Form::hidden('invoice_item_id', '', ['class'=>'invoice_item_id']) !!}
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'account_code', 'form_class' => 'account-code inputmask-account-code text-center' ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'description', 'form_class' => 'description' ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'quantity', 'form_class' => 'quantity inputmask-number text-center' ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'uom', 'form_class' => 'uom text-center' ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'unit_price', 'form_class' => 'unit-price inputmask-decimal-2 text-center' ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'discount', 'form_class' => 'discount inputmask-decimal-2 text-center' ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'amount', 'form_class' => 'amount inputmask-decimal-2 text-center' ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'tax_amount', 'form_class' => 'tax-amount inputmask-decimal-2 text-center' ])
        </td>
        <td class="p-0">
            @include('components.form.table.text', [ 'name' => 'subtotal', 'form_class' => 'subtotal inputmask-decimal-2 text-center' ])
        </td>
        <th class="p-0 pt-1 text-center"></th>
    </tr>
    <tr>
        <td></td>
        <td class="p-0 pt-1 text-center">
            <small class="font-weight-bold">ITEM CODE</small>
            @include('components.form.general.select2', [
                'name' => 'item_code',
                'select2class' => 'select2-item-code',
                'placeholder' => 'Please select an item code ',
                'is_required' => true,
                'array' => isset($set_item_code) ? [ $set_item_code => $set_item_code ] : [],
                'value' => $set_item_code ?? null,  // if view on edit page, this should help set default value when select2 has no array
            ])
            {{-- @include('components.form.table.text', [ 'name' => 'item_code', 'form_class' => 'item-code text-center' ]) --}}
        </td>
        <td class="p-0 pt-1 text-center">
            <small class="font-weight-bold">DETAILS</small>
            @include('components.form.table.text', [ 'name' => 'details', 'form_class' => 'details' ])
        </td>
        <td></td>
        <td class="p-0 pt-1 text-center">
            <small class="font-weight-bold">UOM RATE</small>
            @include('components.form.table.text', [ 'name' => 'uom_rate', 'form_class' => 'uom-rate inputmask-number text-center' ])
        </td>
        <td class="p-0 pt-1 text-center">
            <small class="font-weight-bold">DISC. TYPE</small>
            @include('components.form.table.text', [ 'name' => 'discount_type', 'form_class' => 'discount-type text-center' ])
        </td>
        <td class="p-0 pt-1 text-center">
            <small class="font-weight-bold">DISC. RATE</small>
            @include('components.form.table.text', [ 'name' => 'discount_type', 'form_class' => 'discount-rate inputmask-decimal-2 text-center' ])
        </td>
        <td class="p-0 pt-1 text-center">
            <small class="font-weight-bold">TAX CODE</small>
            @include('components.form.general.select2', [
                'name' => 'tax_code',
                'select2class' => 'select2-tax-code',
                'placeholder' => 'Please select an tax code ',
                'is_required' => true,
                'array' => isset($set_tax_code) ? [ $set_tax_code => $set_tax_code ] : [],
                'value' => $set_tax_code ?? null,  // if view on edit page, this should help set default value when select2 has no array
            ])
            {{-- @include('components.form.table.text', [ 'name' => 'tax_code', 'form_class' => 'tax-code text-center' ]) --}}
        </td>
        <td class="p-0 pt-1 text-center">
            <small class="font-weight-bold">TAX RATE</small>
            @include('components.form.table.text', [ 'name' => 'tax_code', 'form_class' => 'tax-rate inputmask-decimal-2 text-center' ])
        </td>
        <td class="p-0 px-1 text-center align-middle">
            <button type="button" class="btn btn-primary form-control save-btn" data-id="{{ $resource->id }}" data-route="{{ route('transaction.invoice.save-content', 'ID') }}">
                <i class="fas fa-arrow-right pr-2"></i>
                SAVE
            </button>
        </td>
        <td class="p-0 pt-3 text-center">
            @include('components.form.others.btn-circle-delete', ['delete_url' => route("transaction.invoice.delete-content", "id"), 'id' => $resource->id])
        </td>
    </tr>
</tbody>
<tfoot>
    <tr>
        <td class="border-dark border-top" colspan="3" rowspan="2"></td>
        <th class="border-dark border-top text-center" colspan="2">Apply Discount</th>
        <th class="border-dark border-top text-center" colspan="2">Total Item Discount</th>
        <th class="border-dark border-top text-center">Total Amount</th>
        <th class="border-dark border-top text-center">Total Tax</th>
        <th class="border-dark border-top text-center">Grand Total</th>
        <th class="border-dark border-top text-center align-middle" rowspan="2">
            @include('components.form.others.btn-circle-ajax-submit')
        </th>
    </tr>
    <tr>
        <th class="text-center" colspan="2">
            @include('components.form.table.text', [ 'name' => 'master_discount', 'form_class' => 'master-discount text-center inputmask-money' ])
        </th>
        <th class="text-center discount" colspan="2">
            {{ display_numbers($resource->items->sum('discount'), 2) }}
        </th>
        <th class="text-center amount">
            {{ display_numbers($resource->items->sum('amount'), 2) }}
        </th>
        <th class="text-center tax_amount">
            {{ display_numbers($resource->items->sum('tax_amount'), 2) }}
        </th>
        <th class="text-center grand_total">
            {{-- {{ display_numbers($resource_items->sum('subtotal'), 2) }} --}}
            {{ display_numbers($resource->grand_total, 2) }}
        </th>
    </tr>
</tfoot>
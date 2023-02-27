<tr class="tr-template d-none">
    <td width="5%" class="text-center">
        {!! Form::checkbox('RV_CHECKED[]', null, false, ['class' => 'item_check']) !!}
        {!! Form::hidden('existing_payment[]', false, ['class' => 'existing_payment']) !!}
        {!! Form::hidden('is_checked[]', false, ['class' => 'is_checked']) !!}
    </td>
    <td width="10%" class="">
        <span class="displayed-value"></span>
        {!! Form::hidden('bill_no[]', null, ['class' => 'bill_no']) !!}
        {!! Form::hidden('bill_id[]', null, ['class' => 'bill-id']) !!}
        {!! Form::hidden('bill_type[]', null, ['class' => 'bill-type']) !!}
        {!! Form::hidden('bill_dbcr_account[]', null, ['class' => 'bill-dbcr-account']) !!}
        {!! Form::hidden('bill_original_amount[]', null, ['class' => 'bill-original-amount']) !!}
    </td>
    <td width="10%" class="">
        <span class="date"></span>
    </td>
    <td width="20%">
        <div class="input-group">
            {!! Form::text('description[]', null, ['class' => 'form-control form-control-xs description']) !!}
            <div class="input-group-append toggle-details" data-toggle="collapse" data-target="#row-detail-id">
                <span class="input-group-text  bg-dark-blue text-white">
                    <i class="fa fa-expand" ></i>
                </span>
            </div>
        </div>
    </td>
    <td width="8%" class="text-right">
        <span class="displayed-value">0.00</span>
        {!! Form::hidden('bill_amount[]', null, ['class' => 'bill_amount']) !!}
    </td>
    <td width="8%" class="text-right">
        <span class="displayed-value">0.00</span>
        {!! Form::hidden('paid_amount[]', null, ['class' => 'paid_amount']) !!}
    </td>
    <td width="8%" class="text-right">
        <span class="displayed-value">0.00</span>
        {!! Form::hidden('outstanding_amount[]', null, ['class' => 'outstanding_amount']) !!}
    </td>
    <td width="8%" class="text-right">
        {!! Form::text('applied_amount[]', null, [
            'class' => 'form-control applied_amount money',
            'data-bill-amount' => 0.00,
            'data-paid-amount' => 0.00,
            'data-outstanding-amount' => 0.00
        ]) !!}
    </td>
</tr>
<tr class="narrow-padding tr-template d-none row-detail collapse">
    <td colspan="13">
        {!! Form::textarea('details[]', null, ['class' => 'form-control form-control-xs details', 'rows' => 1]) !!}
    </td>
</tr>

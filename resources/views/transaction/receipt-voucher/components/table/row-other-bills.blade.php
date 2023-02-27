{{-- Other Bills is from view_outstanding_bills --}}

@if (isset($otherBills))
    @foreach ($otherBills as $bill)
        <tr>
            <td width="5%" class="text-center">
                {!! Form::checkbox('RV_CHECKED[]', null, false, ['class' => 'item_check']) !!}
                {!! Form::hidden('existing_payment[]', false, ['class' => 'existing_payment']) !!}
                {!! Form::hidden('is_checked[]', false, ['class' => 'is_checked']) !!}
            </td>
            <td width="10%" class="">
                <span class="displayed-value">{{ $bill->doc_no }}</span>
                {!! Form::hidden('bill_no[]', $bill->doc_no, ['class' => 'bill_no']) !!}
                {!! Form::hidden('bill_id[]', $bill->id) !!}
                {!! Form::hidden('bill_type[]', $bill->type) !!}
                {!! Form::hidden('bill_dbcr_account[]', $bill->dbcr_account) !!}
                {!! Form::hidden('bill_original_amount[]', $bill->original_amount) !!}
            </td>
            <td width="10%" class="">
                {{ $bill->dmyDate }}
            </td>
            <td width="20%">
                <div class="input-group">
                    {!! Form::text('description[]', !empty($bill->description) ? $bill->description : $bill->doc_no, [
                        'class' => 'form-control description'
                    ]) !!}
                    <div class="input-group-append toggle-details" data-toggle="collapse" data-target="#row-detail-{{ $bill->bill_id }}">
                        <span class="input-group-text  bg-dark-blue text-white">
                            <i class="fa fa-expand" ></i>
                        </span>
                    </div>
                </div>
            </td>
            <td width="8%" class="text-right">
                <span class="displayed-value">{{ number_format($bill->amount, 2) }}</span>
                {!! Form::hidden('bill_amount[]', number_format($bill->amount, 2), ['class' => 'bill_amount']) !!}
            </td>
            <td width="8%" class="text-right">
                <span class="displayed-value">{{ number_format($bill->amount - $bill->remaining_amount, 2) }}</span>
                {!! Form::hidden('paid_amount[]', number_format($bill->amount - $bill->remaining_amount, 2), ['class' => 'paid_amount']) !!}
            </td>
            <td width="8%" class="text-right">
                <span class="displayed-value">{{ number_format($bill->remaining_amount, 2) }}</span>
                {!! Form::hidden('outstanding_amount[]', number_format($bill->remaining_amount, 2), ['class' => 'outstanding_amount']) !!}
            </td>
            <td width="8%" class="text-right">
                {!! Form::text('applied_amount[]', null, [
                    'class' => 'form-control applied_amount money',
                    'data-bill-amount' => number_format($bill->amount, 2),
                    'data-paid-amount' => number_format($bill->amount - $bill->remaining_amount, 2),
                    'data-outstanding-amount' => number_format($bill->remaining_amount, 2)
                ]) !!}
            </td>
        </tr>
        <tr class="narrow-padding row-detail-filled collapse" id="row-detail-{{ $bill->bill_id }}">
            <td colspan="13">
                {!! Form::textarea('details[]', null, ['class' => 'form-control form-control-xs details summernote', 'rows' => 1]) !!}
            </td>
        </tr>
    @endforeach
@endif
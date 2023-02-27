{{-- Paid Bills is from view_bill_payments --}}

@if (isset($paidBills))
    @foreach ($paidBills as $bill)
        @php $appliedAmount += $bill->paid_amount; @endphp
        <tr class="bg-very-light-blue tr-paid-bills">
            <td width="5%" class="text-center">
                {!! Form::checkbox('RV_CHECKED[]', $bill->id, true, ['class' => 'item_check', 'checked']) !!}
                {!! Form::hidden('existing_payment[]', 'true', ['class' => 'existing_payment']) !!}
                {!! Form::hidden('is_checked[]', 'true', ['class' => 'is_checked']) !!}
            </td>
            <td width="10%">
                <span class="displayed-value">{{ $bill->bill_doc_no }}</span>
                {!! Form::hidden('bill_no[]', $bill->bill_doc_no, ['class' => 'bill_no']) !!}
                {!! Form::hidden('bill_id[]', $bill->bill_id) !!}
                {!! Form::hidden('bill_type[]', $bill->bill_type) !!}
                {!! Form::hidden('bill_dbcr_account[]', $bill->dbcr_account) !!}
                {!! Form::hidden('bill_original_amount[]', $bill->bill_amount) !!}
            </td>
            <td width="10%" class="">
                {{ $bill->dmyDate }}
            </td>
            <td width="20%">
                <div class="input-group">
                    {!! Form::text('description[]', !empty($bill->description) ? $bill->description : $bill->bill_doc_no, [
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
                <span class="displayed-value">{{ number_format($bill->bill_amount, 2) }}</span>
                {!! Form::hidden('bill_amount[]', number_format($bill->bill_amount, 2), ['class' => 'bill_amount']) !!}
            </td>
            <td width="8%" class="text-right">
                <span class="displayed-value">{{ number_format($paidBillsAmount[$bill->bill_doc_no]->current_paid_amount, 2) }}</span>
                {!! Form::hidden('paid_amount[]', number_format($paidBillsAmount[$bill->bill_doc_no]->current_paid_amount, 2), ['class' => 'paid_amount']) !!}
            </td>
            <td width="8%" class="text-right">
                <span class="displayed-value">{{ number_format(($bill->bill_amount - $paidBillsAmount[$bill->bill_doc_no]->current_paid_amount), 2) }}</span>
                {!! Form::hidden('outstanding_amount[]', number_format($bill->bill_amount - $paidBillsAmount[$bill->bill_doc_no]->current_paid_amount, 2), ['class' => 'outstanding_amount']) !!}
            </td>
            <td width="8%" class="text-right">
                <span class="displayed-value">{{ number_format($bill->paid_amount, 2) }}</span>
                {!! Form::hidden('applied_amount[]', number_format($bill->paid_amount, 2), ['class' => 'applied_amount']) !!}
            </td>
        </tr>
        <tr class="narrow-padding row-detail-filled collapse" id="row-detail-{{ $bill->bill_id }}">
            <td colspan="13">
                {!! Form::textarea('details[]', $bill->details, ['class' => 'form-control form-control-xs details summernote', 'rows' => 1]) !!}
            </td>
        </tr>
    @endforeach
@endif
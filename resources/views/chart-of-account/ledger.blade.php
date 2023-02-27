<tr data-id="{{ $ledger->id }}">
    <td class="content pt-1 pb-0 pl-0 pr-0">
        {!! Form::hidden('id[]', $ledger->id, ['class' => 'ledger_id']) !!}
        {!! Form::text('full_code', $ledger->full_code, ['class' => 'form-control full-code', 'readonly']) !!}
    </td>
    <td class="content pt-1 pb-0 pl-0 pr-0">
        {!! Form::text('description', $ledger->description, ['class' => 'form-control description']) !!}
    </td>
    <td class="content pt-1 pb-0 pl-0 pr-0">
        {!! Form::text('opening', $ledger->opening, ['class' => 'form-control inputmask-money opening']) !!}
    </td>
    <td class="content pt-1 pb-0 pl-0 pr-0">
        {!! Form::text('last_year_balance', $ledger->last_year_balance, ['class' => 'form-control inputmask-money last-year-balance']) !!}
    </td>
    <td class="content pt-1 pb-0 pl-0 pr-0">
        {!! Form::select('currency', $currencies ?? [], $ledger->currency, ['class' => 'form-control currency']) !!}
    </td>
    <td class="content text-center pointer bg-info text-white save-gl" data-route="{{ route('chart-of-account.ledger.quick-save', $ledger->id) }}">
        <span class="fa fa-save pr-2"></span>
    </td>
    <td class="content text-center pointer bg-success text-white edit-gl" data-route="{{ route('chart-of-account.ledger.update', $ledger->id) }}"
        data-id="{{ $ledger->id }}" data-method="PUT">
        <span class="fa fa-edit pr-2"></span>
    </td>
</tr>

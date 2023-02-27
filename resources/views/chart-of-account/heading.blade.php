<tr class="bg-primary text-white">
    <td colspan="5">
        <div class="row group pointer chart-of-account-row" data-id="{{ $chart_of_account->id }}"
            data-route="{{ route('chart-of-account.update', $chart_of_account->id) }}" data-method="PUT">
            <div class="col">{{ $chart_of_account->description }}</div>
            <div class="col"><div class="text-right text-white">
                <small>
                    {{ $chart_of_account->type }} / {{ $chart_of_account->classification }}
                </small>
            </div>
        </div>
    </td>
    <td class="text-center pointer bg-info pt-2 pb-0 add-sub" data-chac-code="{{ $chart_of_account->code }}" data-main-coa="{{ $chart_of_account->id }}">
        <span class="fa fa-plus pr-2"></span> SUB
    </td>
    <td class="text-center pointer bg-success pt-2 pb-0 add-gl" data-heading="{{ $chart_of_account->description }}"
        data-main-coa-sub="{{ $chart_of_account->id }}" data-route="#" data-coa-code="{{ $chart_of_account->code }}">
        <span class="fa fa-plus pr-2"></span> GL
    </td>
</tr>

<tr class="bg-info text-white">
    <td colspan="5">
        <div class="row group pointer sub-chart-of-account-row" data-id="{{ $subheading->id }}" 
            data-route="{{ route('chart-of-account.subheading.update', $subheading->id) }}" data-method="PUT">
            <div class="col">{{ $subheading->description }}</div>
            <div class="col"><div class="text-right text-white">
                <small>
                    {{ $chart_of_account->description }}
                </small>
            </div>
        </div>
    </td>
    <td colspan="2" class="text-center pointer bg-success pt-2 pb-0 add-gl" data-heading="{{ $subheading->description }}"
        data-main-coa-sub="{{ $subheading->id }}" data-route="#" data-coa-sub-code="{{ $subheading->code }}" data-coa-code="{{ $chart_of_account->code }}">
        <span class="fa fa-plus pr-2"></span> GL
    </td>
</tr>

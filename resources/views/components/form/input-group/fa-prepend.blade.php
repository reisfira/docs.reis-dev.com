@php
    $data_columns = '';
    $data_headings = '';
    $data_table = '';
    $data_namespace = '';
    $data_route_type = '';

    if (isset($dataColumns)) {
        $columns = array_keys($dataColumns);
        $headings = array_values($dataColumns);

        $data_columns = implode(',', $columns);
        $data_headings = implode(',', $headings);
        $data_table = $dataTable;
        $data_namespace = $dataNamespace;
        $data_route_type = $dataRouteType;
    }
@endphp
<div class="input-group-prepend {{ isset($additionalClass) ? $additionalClass : '' }}"
    data-table="{{ $data_table }}" data-route-type="{{ $data_route_type }}" data-namespace="{{ $data_namespace }}"
    data-url="{{ isset($dataUrl) ? $dataUrl : '' }}" data-columns="{{ $data_columns }}" data-headings="{{ $data_headings }}">
    <div class="input-group-text  bg-dark-blue text-white">
        <small>
            @if (isset($prepend))
                <i class="{{ $prepend }}"></i>
            @endif
        </small>
    </div>
</div>

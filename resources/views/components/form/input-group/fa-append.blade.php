{{--
    2020-12-01
    This requires documentation; how its linked, when these variables are useful and how exactly to use them
--}}
@php
    $data_columns = '';
    $data_headings = '';
    $data_table = '';
    $data_namespace = '';
    $data_route_type = '';

    $columns = isset($dataColumns) ? array_keys($dataColumns) : [];
    $headings = isset($dataColumns) ? array_values($dataColumns) : [];
    $data_columns = implode(',', $columns);
    $data_headings = implode(',', $headings);

    $dataSearchInputs = isset($dataSearchInputs) ? $dataSearchInputs : [];
    $data_search_inputs = implode(',', $dataSearchInputs);

    $dataSearchColumns = isset($dataSearchColumns) ? $dataSearchColumns : [];
    $data_search_columns = implode(',', $dataSearchColumns);

    $data_table = isset($dataTable) ? $dataTable : '';
    $data_namespace = isset($dataNamespace) ? $dataNamespace : '';
    $data_route_type = isset($dataRouteType) ? $dataRouteType : '';

    // for targeting return from the modal
    $returnTargets = isset($dataTargets) ? array_keys($dataTargets) : [];
    $returnTargetsRef = isset($dataTargets) ? array_values($dataTargets) : [];

    $data_targets = implode(',', $returnTargets);
    $data_target_references = implode(',', $returnTargetsRef);

    // after receiving input from modal (lookup/etc... return with next input field being focused)
    $data_next_focus = isset($dataNextFocus) ? $dataNextFocus : '';
    $data_trigger = isset($dataTrigger) ? $dataTrigger : '';
@endphp
<div class="input-group-append {{ isset($additionalClass) ? $additionalClass : '' }}"
    data-table="{{ $data_table }}" data-route-type="{{ $data_route_type }}" data-namespace="{{ $data_namespace }}"
    data-url="{{ isset($dataUrl) ? $dataUrl : '' }}" data-columns="{{ $data_columns }}" data-headings="{{ $data_headings }}"
    data-search-columns="{{ $data_search_columns }}" data-search-inputs="{{ $data_search_inputs }}"
    data-context="{{ isset($context) ? $context : '' }}" data-target="{{ isset($target) ? $target : '' }}"
    data-targets="{{ $data_targets }}" data-target-references="{{ $data_target_references }}"
    data-next-focus="{{ $data_next_focus }}" data-trigger="{{ $data_trigger }}">
    <div class="input-group-text {{ isset($custom_color) ? $custom_color : 'bg-primary text-white' }} {{ (isset($clickable) && $clickable) ? 'pointer' : '' }}">
        <small class="icon">
            @if (isset($append))
                <i class="{{ $append }}"></i>
            @endif
            @if (isset($text))
              {!! $text !!}
            @endif
        </small>
    </div>
</div>

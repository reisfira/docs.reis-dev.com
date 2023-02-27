@php $gap_class = isset($narrow_gap) && $narrow_gap ? 'form-row mb-1' : 'form-group row' @endphp
<div class="{{ $gap_class }} inputs-container">
    <div class="col-3">
        @include('components.form.general.checkbox', ['name' => $name.'_check', 'checked' => true, 'form_class' => 'input-check' ])
        {!! Form::hidden('search_'.$name, false, ['class' => 'input-use-search']) !!}
        {!! Form::label('range_'.$name, $label, ['class' => 'col-form-label col-form-label-sm pl-2']) !!}
    </div>
    <div class="col-4">
        @include('components.form.general.text-w-lookup', [
            'name' => 'range_'.$name.'_from',
            'form_class' => 'input-checked-field modal-input modal-input-from input-from range-'.$name.'-from',
            'lookup_class' => 'dbcr-lookup-by-js',
            'context' => $context ?? '.reporting-modal-form',
            'target' => '.range-'.$name.'-from',
            'dataTable' => $table,
            'dataUrl' => $lookupUrl ?? route('api.lookup.simple.master'),
            'dataColumns' => $columns,
        ])
    </div>
    @if (!isset($hide_to))
    <div class="col-4">
        @include('components.form.general.text-w-lookup', [
            'name' => 'range_'.$name.'_to',
            'form_class' => 'input-checked-field modal-input modal-input-to input-to range-'.$name.'-to',
            'lookup_class' => 'dbcr-lookup-by-js',
            'context' => $context ?? '.reporting-modal-form',
            'target' => '.range-'.$name.'-to',
            'dataTable' => $table,
            'dataUrl' => $lookupUrl ?? route('api.lookup.simple.master'),
            'dataColumns' => $columns,
        ])
    </div>
    @endif
</div>

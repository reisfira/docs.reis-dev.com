<div class="form-group row inputs-container">
    <div class="col-3">
        @include('components.form.general.checkbox', ['name' => $name.'_check', 'checked' => true, 'form_class' => 'input-check' ])
        {!! Form::hidden('search_'.$name, true, ['class' => 'input-use-search']) !!}
    </div>
    <div class="col-4">
        @include('components.form.general.text-w-lookup', [
            'name' => 'range_'.$name.'_from',
            'form_class' => 'input-checked-field modal-input modal-input-from input-from range-'.$name.'-from',
            'lookup_class' => $lookup_class ?? 'lookup-by-js',
            'context' => $context ?? '.reporting-modal-form',
            'target' => '.range-'.$name.'-from',
            'dataTable' => $table,
            'dataUrl' => $lookup_url ?? '',
            'dataColumns' => $columns,
        ])
    </div>
    @if (!isset($hide_to))
    <div class="col-4">
        @include('components.form.general.text-w-lookup', [
            'name' => 'range_'.$name.'_to',
            'form_class' => 'input-checked-field modal-input modal-input-to input-to range-'.$name.'-to',
            'lookup_class' => $lookup_class ?? 'lookup-by-js',
            'context' => $context ?? '.reporting-modal-form',
            'target' => '.range-'.$name.'-to',
            'dataTable' => $table,
            'dataUrl' => $lookup_url ?? '',
            'dataColumns' => $columns,
        ])
    </div>
    @endif
</div>

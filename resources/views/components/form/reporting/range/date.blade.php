@php
    $name = $name ?? 'date';
    $label = $label ?? 'Date';
    $from = $from_class ?? 'date-from';
    $to = $to_class ?? 'date-to';
@endphp
<div class="form-group row inputs-container">
    <div class="col-3">
        @include('components.form.general.checkbox', ['name' => "{$name}_check", 'checked' => true, 'form_class' => 'input-check' ])
        {!! Form::hidden("search_{$name}", true, ['class' => 'input-use-search']) !!}
        {!! Form::label("range_{$name}", $label ?? $label, ['class' => 'col-form-label pl-2']) !!}
    </div>
    <div class="col-4">
        @include('components.form.general.date-unitialized', [
            'name' => "range_{$name}_from",
            'form_class' => "input-checked-field input-from $from"
        ])
    </div>
    <div class="col-4">
        @include('components.form.general.date-unitialized', [
            'name' => "range_{$name}_to",
            'form_class' => "input-checked-field input-to $to"
        ])
    </div>
</div>
@php
    $additional_class = isset($class) ? $class : '';
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $required = (isset($is_required) && $is_required) ? 'required' : '';
    $font_weight = isset($bold_label) ? 'font-weight-bold' : 'font-weight-normal';
@endphp
<div class="form-group row">
    {!! Form::label($name, $label, ['class' => isset($custom_label_class) ? $custom_label_class : "col-sm-3 col-form-label {$font_weight} {$required}"]) !!}
    <div class="col-8">
        {!! Form::textarea($name, $value ?? null, ['class' => 'form-control template-receiver '.$additional_class, 'rows' => $row_count ?? '4', $disabled, $required]) !!}
    </div>
</div>

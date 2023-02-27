@php
    $row_gutter = isset($narrow_gutter) && $narrow_gutter ? 'mb-1' : '';
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $readonly = (isset($readonly_input) && $readonly_input) ? 'readonly' : '';
    $required = (isset($is_required) && $is_required) ? 'required' : '';
    $extras = isset($extras) ? $extras : '';
    $font_weight = isset($bold_label) ? 'font-weight-bold' : 'font-weight-normal';
@endphp

<div class="form-group row {{ $row_gutter }}">
    {!! Form::label($name, $label, ['class' => "col-sm-3 col-form-label {$font_weight} {$required}"]) !!}
    <div class="col-sm-8">
        {!! Form::password($name, isset($value) ? $value : null, [
            'class' => 'form-control '.$class,
            $disabled,
            $required,
            $extras,
        ]) !!}
    </div>
</div>

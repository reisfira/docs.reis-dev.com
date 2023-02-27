@php
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $readonly = (isset($readonly_input) && $readonly_input) ? 'readonly' : '';
    $extras = isset($extras) ? $extras : '';
    $row_gutter = isset($narrow_gutter) && $narrow_gutter ? 'mb-1' : '';
    $required = isset($is_required) ? 'required' : '';
@endphp
{!! Form::text($name, isset($value) ? $value : null, [
    'class' => "form-control {$row_gutter} {$class}",
    'placeholder' => $placeholder ?? '',
    $disabled,
    $extras,
    $required,
]) !!}

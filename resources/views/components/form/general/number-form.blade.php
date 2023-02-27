@php
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $max_attr = isset($max) ? 'max="'.$max.'"': '';
    $min_attr = isset($min) ? 'min="'.$min.'"': '';
@endphp
{!! Form::number($name, isset($value) ? $value : null, ['class' => 'form-control '.$class, $disabled, $max_attr, $min_attr]) !!}

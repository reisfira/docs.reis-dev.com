@php
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'readonly' : '';
    $extras = isset($extras) ? $extras : '';
    $required = isset($is_required) ? 'required' : '';
@endphp
{!! Form::text($name, isset($value) ? $value : null, [
    'class' => 'form-control border-0 '.$class,
    'placeholder' => $placeholder ?? '',
    $disabled,
    $extras,
    $required,
]) !!}

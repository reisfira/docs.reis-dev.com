@php
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
@endphp
{!! Form::text($name, isset($value) ? $value : null, ['class' => 'form-control inputmask-decimal '.$class, 'placeholder' => '-', $disabled]) !!}

@php
    $picker = isset($picker_class) ? $picker_class : 'uninitialized-datepicker';
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $required = isset($is_required) && $is_required ? 'required' : '';
@endphp
{!! Form::text($name, isset($value) ? $value : null, ['class' => "form-control pl-2 $picker $class", 'autocomplete' => 'off', $disabled, $required]) !!}

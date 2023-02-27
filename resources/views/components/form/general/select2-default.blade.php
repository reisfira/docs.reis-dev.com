@php
    $class = isset($form_class) ? $form_class : $name;
    $required = isset($is_required) ? $is_required : false;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
@endphp
{!! Form::select($name, $array, isset($value) ? $value : null, [
    'class' => 'form-control select2 '.$class,
    $required ? 'required': '',
    isset($remove_placeholder) ? '' : 'placeholder' => '-',
    isset($multiple) ? 'multiple' : '',
    $disabled
]) !!}
@if (isset($hint)) <small class="form-text text-muted">{!! $hint !!}</small> @endif

@php
    $class = isset($form_class) ? $form_class : $name;
    $required = isset($is_required) ? $is_required : false;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
@endphp
{!! Form::select($name, $array, isset($value) ? $value : null, [
    'class' => 'form-control uninitialized-select2 '.$class,
    'id' => isset($id) ? $id : '',
    isset($remove_placeholder) ? '' : 'placeholder' => '-',
    isset($multiple) ? 'multiple' : '',
    $required ? 'required': '',
    $disabled,
    $extras ?? '',
]) !!}
@if (isset($hint)) <small class="form-text text-muted">{!! $hint !!}</small> @endif

@php
    $select2class = isset($select2class) ? $select2class : 'select2-state-id';
    $class = isset($form_class) ? $form_class : $name;
    $required = isset($is_required) ? $is_required : false;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $data_dbcr_type = isset($dbcr_type) ? "data-dbcr-type=\"{$dbcr_type}\"" : '';
@endphp
{!! Form::select($name, $array, isset($value) ? $value : null, [
    'class' => "form-control {$select2class} {$class}",
    $required ? 'required': '',
    isset($remove_placeholder) ? '' : 'placeholder' => $placeholder ?? '',
    isset($multiple) ? 'multiple' : '',
    $disabled,
    $data_dbcr_type,
]) !!}
@if (isset($hint)) <small class="form-text text-muted">{!! $hint !!}</small> @endif

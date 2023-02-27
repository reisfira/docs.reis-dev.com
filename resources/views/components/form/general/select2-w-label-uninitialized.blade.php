@php
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $select2_class = $select2_class ?? 'uninitialized-select2';
    $font_weight = isset($bold_label) ? 'font-weight-bold' : 'font-weight-normal';
@endphp
<div class="form-group row">
    {!! Form::label($name, $label, ['class' => "col-sm-3 col-form-label {$font_weight}" ]) !!}
    <div class="col-sm-8">
        {!! Form::select($name, $array, isset($value) ? $value : null, [
            'class' => "form-control {$select2_class} ".$class,
            'id' => isset($id) ? $id : $name,
            isset($remove_placeholder) ? '' : 'placeholder' => '-',
            isset($multiple) ? 'multiple' : '',
            $disabled
        ]) !!}
        @if (isset($hint)) <small class="form-text text-muted">{!! $hint !!}</small> @endif
    </div>
</div>

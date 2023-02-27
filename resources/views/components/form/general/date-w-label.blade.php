@php
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $datepicker_class = isset($datetimepicker) && $datetimepicker ? 'datetimepicker' : 'datepicker';
    $row_gutter = isset($narrow_gutter) && $narrow_gutter ? 'mb-1' : '';
    $required = isset($required) && $required ? 'required' : '';
    $font_weight = isset($bold_label) ? 'font-weight-bold' : 'font-weight-normal';
@endphp
<div class="form-group row {{ $row_gutter }}">
    {!! Form::label($name, $label, ['class' => "col-sm-3 col-form-label {$required} {$font_weight}"]) !!}
    <div class="col-sm-8">
        {!! Form::text($name, isset($value) ? $value : null, ['class' => 'form-control pl-2 '.$class.' '.$datepicker_class, 'autocomplete' => 'off', $required, $disabled]) !!}
    </div>
</div>

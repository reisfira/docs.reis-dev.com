@php
    $row_gutter = isset($narrow_gutter) && $narrow_gutter ? 'mb-1' : '';
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $readonly = (isset($readonly_input) && $readonly_input) ? 'readonly' : '';
    $required = (isset($is_required) && $is_required) ? 'required' : '';
    $extras = isset($extras) ? $extras : '';
    $font_weight = isset($bold_label) ? 'font-weight-bold' : 'font-weight-normal';
@endphp
<div class="form-group row {{ $row_gutter }}">
    {!! Form::label($name, $label, ['class' => isset($custom_label_class) ? $custom_label_class : "col-sm-3 col-form-label {$font_weight} {$required}"]) !!}
    <div class="{{ isset($custom_size) ? $custom_size : 'col-sm-8' }}">
        {!! Form::text($name, isset($value) ? $value : null, [
            'class' => 'form-control '.$class,
            'placeholder' => isset($placeholder) ? $placeholder : '-',
            'autocomplete' => isset($autocomplete_off) ? 'off' : 'on',
            $disabled,
            $readonly,
            $required,
            $extras,
        ]) !!}

        @if (isset($hint))
            <small class="form-text text-muted">{!! $hint !!}</small>
        @endif
    </div>
</div>

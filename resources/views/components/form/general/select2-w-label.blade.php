@php
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $required = (isset($is_required) && $is_required) ? 'required' : '';
    $select2_class = $select2_custom_class ?? 'select2';
    $row_gutter = isset($narrow_gutter) && $narrow_gutter ? 'mb-1' : '';
    $font_weight = isset($bold_label) ? 'font-weight-bold' : 'font-weight-normal';
@endphp
<div class="form-group row {{ $row_gutter }}">
    {!! Form::label($name, $label, ['class' => "col-sm-3 col-form-label {$required} {$font_weight}"]) !!}
    <div class="col-sm-8">
        {!! Form::select($name, $array, isset($value) ? $value : null, [
            'class' => "form-control {$select2_class} {$class}",
            isset($remove_placeholder) ? '' : 'placeholder' => '-',
            isset($multiple) ? 'multiple' : '',
            $disabled,
            $required,
        ]) !!}
        @if (isset($hint)) <small class="form-text text-muted">{!! $hint !!}</small> @endif
    </div>
</div>

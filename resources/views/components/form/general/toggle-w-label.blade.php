@php
    $font_weight = isset($bold_label) ? 'font-weight-bold' : 'font-weight-normal';
@endphp
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="{{ isset($name) ? $name : 'option' }}" class="check {{ isset($class) ? $class : '' }}" data-toggle="toggle"
            data-on="{{ isset($data_on) ? $data_on : 'Yes' }}" data-off="{{ isset($data_off) ? $data_off : 'No' }}"
            data-onstyle="{{ isset($data_on_style) ? $data_on_style : 'success' }}" data-offstyle="{{ isset($data_off_style) ? $data_off_style : 'secondary' }}"
            data-width="{{ isset($data_width) ? $data_width : '70' }}" data-height="{{ isset($data_height) ? $data_height : '10' }}"
            {{ isset($checked) && $checked ? 'checked' : ''}}
            value="{{ isset($name) ? $name : 0 }}">
    </div>
    {!! Form::label($name, $label, ['class' => "col-md-10 col-form-label {$font_weight}"]) !!}
</div>

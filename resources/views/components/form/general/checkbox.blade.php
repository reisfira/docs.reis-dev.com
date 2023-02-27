@php
    $class = isset($form_class) ? $form_class : '' ;
    $value = $value ?? $name;
    $checked = $checked ?? false;
    $bold_label = isset($bold) && $bold ? 'col-form-label font-weight-bold' : '';
@endphp
<div class="form-check form-check-inline">
    {!! Form::checkbox($name, $value, $checked, ['class' => "form-check-input {$class}", 'id' => $id ?? $name, $extras ?? '']) !!}
    <label class="form-check-label {{ $bold_label }}" for="{{ $id ?? $name }}">{{ $label ?? '' }}</label>
</div>

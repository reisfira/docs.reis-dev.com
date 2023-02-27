@php
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $row_gutter = isset($narrow_gutter) && $narrow_gutter ? 'mb-1' : '';
    $fa_class = isset($fa_class) ? $fa_class : 'fa fa-search';
    $append_class = isset($append_class) ? $append_class : '';
    $font_weight = isset($bold_label) ? 'font-weight-bold' : 'font-weight-normal';
@endphp
<div class="input-group {{ $row_gutter }}">
    {!! Form::text($name, isset($value) ? $value : null, [
        'class' => "form-control {$font_weight} {$class}", $disabled,
        'data-input-context' => isset($input_context) ? $input_context : ".{$class}",
        'placeholder' => $placeholder ?? '',
    ]) !!}
    @include('components.form.input-group.fa-append', [ 'append' => $fa_class, 'additionalClass' => 'pointer '.$append_class ])
</div>
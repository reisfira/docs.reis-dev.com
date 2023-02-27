@php
    $class = isset($form_class) ? $form_class : $name;
    $lookup = isset($lookup_class) ? $lookup_class : 'search-';
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $data_next = isset($next_input) ? "data-next=\"{$next_input}\"" : '';
    $required = (isset($is_required) && $is_required) ? 'required' : '';
    $font_weight = isset($bold_label) ? 'font-weight-bold' : 'font-weight-normal';
@endphp
<div class="input-group">
    {!! Form::text($name, isset($value) ? $value : null, ['class' => "form-control {$required} {$font_weight} $class", 'placeholder' => isset($placeholder) ? $placeholder : '-', $disabled, $data_next]) !!}
    @include('components.form.input-group.fa-append', [ 'append' => isset($fa) ? $fa : 'fas fa-search', 'additionalClass' => "{$lookup} pointer" ])
</div>

@php
    $class = isset($form_class) ? $form_class : $name;
    $lookup = isset($lookup_class) ? $lookup_class : 'search-';
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $data_next = isset($next_input) ? "data-next=\"{$next_input}\"" : '';

    $row_gutter = isset($narrow_gutter) && $narrow_gutter ? ' mb-1 ' : '';
    $small_text_class = isset($small_text) && $small_text ? ' small ' : '';
    $small_form_class = isset($small_text) && $small_text ? ' form-control-sm ' : '';
    $small_label_class = isset($small_text) && $small_text ? ' col-form-label-sm ' : '';
    $input_group_small_class = isset($small_text) && $small_text ? ' input-group-sm ' : '';
@endphp
<div class="form-group row {{ $row_gutter }}">
    {!! Form::label($name, $label, ['class' => 'col-sm-3 col-form-label '.$small_label_class]) !!}
    <div class="col-sm-8">
        <div class="input-group {{ $input_group_small_class }}">
            {!! Form::text($name, isset($value) ? $value : null, ['class' => 'form-control '.$class.$small_form_class, 'placeholder' => '-', $disabled, $data_next]) !!}
            @include('components.form.input-group.text-append', [ 'text' => $append ?? '' ])
        </div>
    </div>
</div>

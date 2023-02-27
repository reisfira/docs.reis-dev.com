@php
    $class = isset($form_class) ? $form_class : $name;
    $lookup = isset($lookup_class) ? $lookup_class : 'search-';
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $readonly = (isset($readonly_input) && $readonly_input) ? 'readonly' : '';
    $data_next = isset($next_input) ? "data-next=\"{$next_input}\"" : '';
    $row_gutter = isset($narrow_gutter) && $narrow_gutter ? 'mb-1' : '';
    $required = isset($is_required) && $is_required ? 'required' : '';
    $font_weight = isset($bold_label) ? 'font-weight-bold' : 'font-weight-normal';
@endphp
<div class="form-group row {{ $row_gutter }}">
    {!! Form::label($name, $label, ['class' => "col-sm-3 col-form-label {$font_weight} {$required}"]) !!}
    <div class="col-sm-8">
        <div class="input-group">
            {!! Form::text($name, isset($value) ? $value : null, [
                'class' => 'form-control '.$class,
                'placeholder' => $placeholder ?? '-',
                $required,
                $disabled,
                $readonly,
                $data_next,
            ]) !!}
            @include('components.form.input-group.fa-append', [ 'append' => isset($fa) ? $fa : 'fas fa-search', 'additionalClass' => "{$lookup} pointer" ])
        </div>
        @if (isset($hint))
            <small class="form-text text-muted">{!! $hint !!}</small>
        @endif
    </div>
</div>

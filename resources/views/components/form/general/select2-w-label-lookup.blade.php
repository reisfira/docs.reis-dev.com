<div class="form-group row">
    {!! Form::label($name, $label, ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-8">
        @php
            $class = isset($form_class) ? $form_class : $name;
            $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
            $required = isset($required) && $required ? 'required' : '';
        @endphp
        <div class="input-group">
            {!! Form::select($name, $array, isset($value) ? $value : null, [
                'class' => 'form-control select2 '.$class,
                'id' => isset($id) ? $id : '',
                isset($remove_placeholder) ? '' : 'placeholder' => '-',
                isset($multiple) ? 'multiple' : '',
                $disabled,
                $required,
            ]) !!}
            @include('components.form.input-group.fa-append', [ 'append' => 'fas fa-search', 'additionalClass' => "{$lookup} pointer" ])
        </div>
        @if (isset($hint)) <small class="form-text text-muted">{!! $hint !!}</small> @endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label($name, $label, ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-8">
        @php
            $class = isset($form_class) ? $form_class : $name;
        @endphp
        {!! Form::text($name, isset($value) ? $value : null, ['class' => 'form-control-plaintext pl-2 '.$class, 'placeholder' => '-', 'readonly']) !!}
    </div>
</div>

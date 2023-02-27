<div class="form-group row">
    {!! Form::label($name, $label, ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-8">
        @php
            $class = isset($form_class) ? $form_class : $name;
            $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
        @endphp

        <div class="input-group">
            {!! Form::number($name, null, ['class' => 'form-control '.$class, 'placeholder' => '-', $disabled, 'min' => 0, 'autocomplete' => 'off']) !!}
            @if (isset($appendText))
                @include('components.form.input-group.fa-append', [ 'additionalClass' => 'pointer', 'custom_color' => '', 'text' => $appendText ])
            @endif
        </div>
    </div>
</div>

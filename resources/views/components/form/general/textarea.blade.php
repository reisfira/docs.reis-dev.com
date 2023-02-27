<div class="form-group">
    @php
        $additional_class = isset($class) ? $class : '';
        $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    @endphp
    {!! Form::textarea($name, isset($value) ? $value : null, ['class' => 'form-control '.$additional_class, 'rows' => '4', $disabled]) !!}
</div>

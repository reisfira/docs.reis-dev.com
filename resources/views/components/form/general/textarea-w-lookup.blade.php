<div class="form-group row">
    <div class="col-8">
        {!! Form::label($name, $label, ['class' => 'col-form-label']) !!}
    </div>
    <div class="col-4">
        <button type="button" class="float-right btn btn-primary btn-xs py-2 px-2 template-lookup"
            data-toggle="modal" data-target=".remarks-lookup-modal">Template</button>
    </div>
    <div class="col-12">
        @php
            $additional_class = isset($class) ? $class : '';
            $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
        @endphp
        {!! Form::textarea($name, null, ['class' => 'form-control template-receiver '.$additional_class, 'rows' => '4', $disabled]) !!}
    </div>
</div>

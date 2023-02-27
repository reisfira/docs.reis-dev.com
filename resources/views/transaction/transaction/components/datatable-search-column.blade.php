<div class="form-group row">
    {!! Form::label('', $label, ['class' => "col-sm-4 col-form-label"]) !!}
    <div class="col-sm-4">
        {!! Form::select($name_column, $array, null, [
            'class' => "form-control $name_column",
            'placeholder' => '-',
            '',
        ]) !!}
    </div>
    <div class="{{ 'col-sm-4' }}">
        {!! Form::text($name, null, [
            'class' => 'form-control '. $name,
            'placeholder' => '-',
        ]) !!}
    </div>
</div>
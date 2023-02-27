<div class="form-group row inputs-container">
    <div class="{{ $label_col ?? 'col-3' }}">
        @include('components.form.general.checkbox', ['name' => $name, 'checked' => true, 'form_class' => 'input-check' ])
        {!! Form::hidden('search_'.$name, true, ['class' => 'input-use-search']) !!}
        {!! Form::label($name, $label, ['class' => 'col-form-label pl-2']) !!}
    </div>
    <div class="{{ $input_col ?? 'col-4' }}">
        @foreach ($options as $option)
        <div class="form-check form-check-inline">
            @include('components.form.general.checkbox', [
                'name' => $option['name'],
                'value' => $option['label'],
                'checked' => $option['checked'],
                'form_class' => 'input-check-checkbox',
            ])
            {!! Form::label($name, $option['label'], ['class' => 'col-form-label pl-2 pr-2 radio-label']) !!}
        </div>
        @endforeach
    </div>
</div>

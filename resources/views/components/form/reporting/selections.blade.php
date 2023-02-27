<div class="form-group row inputs-container">
    <div class="{{ $label_col ?? 'col-3' }}">
        @include('components.form.general.checkbox', ['name' => $name, 'checked' => true, 'form_class' => 'input-check' ])
        {!! Form::hidden('search_'.$name, true, ['class' => 'input-use-search']) !!}
        {!! Form::label($name, $label, ['class' => 'col-form-label pl-2']) !!}
    </div>
    <div class="{{ $input_col ?? 'col-4' }}">
        @if (isset($using_uninitialized_select2))
            @include('components.form.general.select2-uninitialized', ['form_class' => $selection_form_class, 'extras' => $selection_extras])
        @else
            @include('components.form.general.select2-default', ['form_class' => $selection_form_class, 'extras' => $selection_extras])
        @endif
    </div>
</div>

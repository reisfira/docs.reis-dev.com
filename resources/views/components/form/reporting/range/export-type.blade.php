<div class="form-group row inputs-container">
    <div class="col-3">
        {!! Form::hidden('search_print_type', true, ['class' => 'input-use-search']) !!}
        {!! Form::label('value_label', 'Print Type', ['class' => 'col-form-label pl-2']) !!}
    </div>
    <div class="col-8">
        @include('components.form.general.radio', ['name' => 'print_type', 'value' => 'pdf', 'checked' => true, 'form_class' => 'input-check-radio input-checked-field' ])
        {!! Form::label('print_type', 'PDF', ['class' => 'col-form-label pl-2 radio-label mr-3']) !!}

        @include('components.form.general.radio', ['name' => 'print_type', 'value' => 'excel', 'checked' => false, 'form_class' => 'input-check-radio input-checked-field' ])
        {!! Form::label('print_type', 'Excel', ['class' => 'col-form-label pl-2 radio-label']) !!}
    </div>
</div>
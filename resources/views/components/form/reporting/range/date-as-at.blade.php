<div class="form-group row inputs-container">
    <div class="col-3">
        @include('components.form.general.checkbox', ['name' => 'date_check', 'checked' => true, 'form_class' => 'input-check' ])
        {!! Form::hidden('search_date_as_at', true, ['class' => 'input-use-search']) !!}
        {!! Form::label('range_date_as_at', 'As at Date', ['class' => 'col-form-label pl-2']) !!}
    </div>
    <div class="col-4">
        @include('components.form.general.date-unitialized', [
            'name' => 'date_as_at',
            'form_class' => 'input-checked-field date-as-at',
            'is_required' => true,
        ])
    </div>
</div>
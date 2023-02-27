<div class="form-group row inputs-container">
    <div class="col-3">
        @include('components.form.general.checkbox', ['name' => 'date_check', 'checked' => true, 'form_class' => 'input-check' ])
        {!! Form::hidden('search_date', true, ['class' => 'input-use-search']) !!}
        {!! Form::label('range_date', 'Date', ['class' => 'col-form-label pl-2']) !!}
    </div>
    <div class="col-4">
        @include('components.form.general.date-unitialized', [
            'name' => 'single_date',
            'form_class' => 'input-checked-field date-from'
        ])
    </div>
    <div class="col-4 input-hint pt-2 d-none">
        <span class="text-muted">
            <i>Option Disabled</i>
        </span>
    </div>
</div>
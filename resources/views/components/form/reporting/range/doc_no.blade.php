<div class="form-group row inputs-container">
    <div class="col-3">
        @include('components.form.general.checkbox', ['name' => 'doc_no_check', 'checked' => true, 'form_class' => 'input-check' ])
        {!! Form::hidden('search_doc_no', true, ['class' => 'input-use-search']) !!}
        {!! Form::label('range_doc_no', 'Doc No', ['class' => 'col-form-label pl-2']) !!}
    </div>
    <div class="col-4">
        @include('components.form.general.select2-uninitialized', [
            'name' => 'range_doc_no_from',
            'array' => isset($array) ? $array : [],
            'form_class' => 'input-checked-field'
        ])
    </div>
    <div class="col-4">
        @include('components.form.general.select2-uninitialized', [
            'name' => 'range_doc_no_to',
            'array' => isset($array) ? $array : [],
            'form_class' => 'input-checked-field'
        ])
    </div>
</div>
<div class="form-group row inputs-container">
    <div class="col-3">
        {!! Form::hidden('search_'.$name, true, ['class' => 'input-use-search']) !!}
        {!! Form::label($name, $label, ['class' => 'col-form-label col-form-label-sm pl-2']) !!}
    </div>
    <div class="col-9">
        @foreach ($options as $option)
        <div class="form-check form-check-inline pr-3">
            @include('components.form.general.radio', [
                'name' => $name,
                'id' => $option['id'],
                'value' => $option['value'],
                'label' => $option['label'],
                'checked' => $option['checked'],
                'form_class' => 'input-check-radio '.$name,
                'extras' => $option['extras'] ?? '',
            ])
        </div>
        @endforeach
    </div>
</div>
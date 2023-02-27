{{--
    NOTE: by default all the variables that start with _ can be found in app/Providers/AppServiceProvider.php
    > $_search_columns_array

    ! however, of course these can be overwritten by passing the parameters from previous page like so:
    * @include('components.form.special.datatable-filter', [
    *    '_search_columns_array' => [],
    *    '_search_using_default' => false,
    * ])
--}}
<div class="datatable-filter form-group row">
    <div class="col-md-6">
        <div class="form-group row mb-1">
            <div class="col-2">
                <label for="context_text" class="col-form-label">Context Text</label>
            </div>
            <div class="col-3">
                @include('components.form.general.select2', [
                    'select2class' => 'select2-default',
                    'name' => 'context_text_column',
                    'array' => $_search_columns_array ?? [],
                    'value' => $_search_using_default ? 'description' : null,
                    'remove_placeholder' => true,
                ])
            </div>
            <div class="col-7">
                @include('components.form.general.text', ['name' => 'context_text'])
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row mb-1">
            <div class="col-2">
                <label for="left_text" class="col-form-label">Left Text</label>
            </div>
            <div class="col-3">
                @include('components.form.general.select2', [
                    'select2class' => 'select2-default',
                    'name' => 'left_text_column',
                    'array' => $_search_columns_array ?? [],
                    'value' => $_search_using_default ? 'code' : null,
                    'remove_placeholder' => true,
                ])
            </div>
            <div class="col-7">
                @include('components.form.general.text', ['name' => 'left_text'])
            </div>
        </div>
    </div>
</div>

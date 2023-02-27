<div class="card card-primary">
    <div class="card-header pointer">FORM</div>
    <div class="card-body">
        @include('components.form.general.select2-w-label', [ 'name' => 'currency_code', 'label' => 'Code', 'array' => $currency_codes, 'remove_placeholder' => true ])
        @include('components.form.general.text-w-label', [ 'name' => 'term', 'label' => 'Term (MM/YYYY)', 'form_class' => 'inputmask-term' ])
        @include('components.form.general.text-w-label', [ 'name' => 'rate', 'label' => 'Rate', 'form_class' => 'inputmask-number-left' ])
    </div>
</div>

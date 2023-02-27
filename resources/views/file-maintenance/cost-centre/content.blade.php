
<div class="card card-primary">
    <div class="card-header pointer">FORM</div>
    <div class="card-body">
        @include('components.form.general.text-w-label', [ 'name' => 'code', 'label' => 'Code', 'form_class' => 'inputmask-alphanumeric-allcaps', 'is_required' => true ])
        @include('components.form.general.text-w-label', [ 'name' => 'description', 'label' => 'Description', 'is_required' => true])

        @include('file-maintenance.cost-centre.general-ledgers-selection')
    </div>
</div>


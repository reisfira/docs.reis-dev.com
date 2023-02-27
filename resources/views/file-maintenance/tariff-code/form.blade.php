<div class="card card-primary">
    <div class="card-header pointer">FORM</div>
    <div class="card-body">
        @include('components.form.general.text-w-label', [ 'name' => 'code', 'label' => 'Code', 'form_class' => 'code inputmask-alphanumeric-allcaps-30', 'is_required' => true, ])
        @include('components.form.general.text-w-label', [ 'name' => 'description', 'label' => 'Description' ])
    </div>
</div>

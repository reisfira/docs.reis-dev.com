<div class="card card-primary">
    <div class="card-header pointer">FORM</div>
    <div class="card-body">
        @include('components.form.general.text-w-label', [ 'name' => 'name', 'label' => 'Name' ])
        @include('components.form.general.text-w-label', [ 'name' => 'email', 'label' => 'Email' ])
        @include('components.form.general.password', ['name' => 'password', 'label' => 'Password' ])

        <div class="mt-5"></div>
        <small><strong>PERMISSION SETTING</strong></small>
        @include('components.form.general.select2-w-label', [ 'name' => 'role', 'label' => 'User Group', 'array' => $user_groups, 'remove_placeholder' => true ])
    </div>
</div>

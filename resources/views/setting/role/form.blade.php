<div class="card card-primary">
    <div class="card-header pointer">FORM</div>
    <div class="card-body">
        @include('components.form.general.text-w-label', [ 'name' => 'name', 'label' => 'Name' ])
    </div>
</div>

<div class="card">
    <div class="card-header">PERMISSIONS</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td width="10%">Group</td>
                    <td width="85%">Features</td>
                    <td width="5%">
                        <button type="button" class="btn btn-primary btn-toggle-all">
                            <i class="fas fa-check"></i>
                        </button>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions_all['permissions_by_module'] as $group => $modules)
                    @foreach ($modules as $module => $module_permissions)
                        <tr class="group-permission-header">
                            <td class="group-name">{{ $module }}</td>
                            <td class="group-permissions">
                                <div class="row">
                                    @foreach ($module_permissions as $module_permission)
                                        <div class="col-2">
                                            @include('components.form.general.checkbox', [
                                                'name' => 'permission[]',
                                                'form_class' => 'permission-checkbox',
                                                'id' => $permissions_all['permissions_slugs'][$module_permission],
                                                'value' => $module_permission,
                                                'label' => $module_permission,
                                                'checked' => in_array($module_permission, $role_permissions),
                                            ])
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td class="group-control">
                                <button type="button" class="btn btn-success btn-group-toggle">
                                    <i class="fas fa-check"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
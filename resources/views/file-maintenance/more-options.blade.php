<div class="dropdown pt-2 float-right">
    <button type="button" class="btn dropdown-toggle text-secondary" data-toggle="dropdown">
        <i class="fas fa-gear pr-2"></i>
        Options
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a href="{{ $delete_route }}" data-method="delete" class="form-delete d-none"></a>
        <button data-route="{{ $delete_route ?? '#' }}" data-method="{{ $delete_method ?? 'DELETE' }}"
            data-confirmation="{{ "Confirm delete this record ? {$resource->code}" }}" class="dropdown-item text-danger swal-delete">
            <i class="fas fa-trash pr-2"></i>
            Delete
        </button>
    </div>
</div>

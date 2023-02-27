<div class="dropdown pt-2 float-right">
    <button type="button" class="btn dropdown-toggle text-secondary" data-toggle="dropdown">
        <i class="fas fa-gear pr-2"></i>
        Options
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        {{-- TODO: to add the ability to open modal and pass id | should trigger modal to allow manual key-in doc no --}}
        <button class="dropdown-item" type="button">
            <i class="fas fa-copy pr-2"></i>
            Duplicate
        </button>

        {{-- TODO: to add the ability to open modal and pass id | should Swal.fire( confirmation to send ) --}}
        <button class="dropdown-item" type="button">
            <i class="fas fa-envelope pr-2"></i>
            Email
        </button>

        {{-- TODO: to add the ability to open setting page --}}
        <button class="dropdown-item" type="button">
            <i class="fas fa-gears pr-2"></i>
            Setting
        </button>

        {{-- TODO: to add the ability to open modal to quickly update the running no. --}}
        <button class="dropdown-item" type="button">
            <i class="fas fa-list-ol pr-2"></i>
            Running No.
        </button>

        <div class="dropdown-divider"></div>
        {{-- TODO: to add the ability to open modal and pass id | should Swal.fire( confirmation to delete ) --}}
        <button class="dropdown-item text-danger" type="button">
            <i class="fas fa-trash pr-2"></i>
            Delete
        </button>
    </div>
</div>

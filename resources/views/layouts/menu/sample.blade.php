<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-circle"></i>
        <p>
            SAMPLE
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        {{-- File Maintenance --}}
        <li class="nav-header">
            <small>FILE MAINTENANCE</small>
        </li>

        <li class="nav-item">
            <a href="{{ route('file-maintenance.cost-centre.index') }}" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list text-white"></i>
                <p>Cost Centre</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('file-maintenance.debtor.index') }}" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list text-white"></i>
                <p>Debtor</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('file-maintenance.area.index') }}" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list text-white"></i>
                <p>Area</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('file-maintenance.salesman.index') }}" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list text-white"></i>
                <p>Salesman</p>
            </a>
        </li>

        {{-- Settings --}}
        <li class="nav-header">
            <small>SETTING</small>
        </li>

        <li class="nav-item">
            <a href="{{ route('setting.user.index') }}" class="nav-link">
                <i class="nav-icon fas fa-gear text-white"></i>
                <p>User</p>
            </a>

        <li class="nav-item">
            <a href="{{ route('setting.role.index') }}" class="nav-link">
                <i class="nav-icon fas fa-gear text-white"></i>
                <p>User Group & Permissions</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('setting.company-setup.view') }}" class="nav-link">
                <i class="nav-icon fas fa-gear text-white"></i>
                <p>Company Setup</p>
            </a>
        </li>

    </ul>
</li>

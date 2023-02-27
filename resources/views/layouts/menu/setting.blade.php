<li class="nav-header">
    <small>SETTING</small>
</li>

<li class="nav-item">
    <a href="{{ route('setting.user.index') }}" class="nav-link">
        <i class="nav-icon fas fa-gear text-white"></i>
        <p>User</p>
    </a>

    <a href="{{ route('setting.role.index') }}" class="nav-link">
        <i class="nav-icon fas fa-gear text-white"></i>
        <p>User Group & Permissions</p>
    </a>

    <a href="{{ route('setting.company-setup.view') }}" class="nav-link">
        <i class="nav-icon fas fa-gear text-white"></i>
        <p>Company Setup</p>
    </a>

    <a href="{{ route('setting.company-setup.view') }}" class="nav-link">
        <i class="nav-icon fas fa-gear text-white"></i>
        <p>System Setup</p>
    </a>

    <a href="{{ route('setting.company-setup.view') }}" class="nav-link">
        <i class="nav-icon fas fa-gear text-white"></i>
        <p>Billing Setup</p>
        {{-- runningn no. --}}
    </a>
</li>
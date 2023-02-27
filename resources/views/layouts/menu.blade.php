@if (Auth::check())
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="fas fa-home nav-icon"></i>
                <p>HOME</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('profile') }}" class="nav-link">
                <i class="fas fa-user nav-icon"></i>
                <p>PROFILE</p>
            </a>
        </li>

        {{-- laravel section --}}
        <li class="nav-header"><small>LARAVEL DEV</small></li>
        <li class="nav-item">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-folder-tree"></i>
                    <p>PROJECT STRUCTURE</p>
                </a>
            </li>

            @include('layouts.menu.laravel.frontend-plugin')
            @include('layouts.menu.laravel.backend-plugin')
            @include('layouts.menu.laravel.sample')
        </li>

        {{-- ionic section --}}
        <li class="nav-header"><small>IONIC DEV</small></li>
        <li class="nav-item">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-folder-tree"></i>
                    <p>PROJECT STRUCTURE</p>
                </a>
            </li>

            @include('layouts.menu.ionic.plugin')
        </li>
    </ul>
</ul>
@else

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('logout') }}" data-method="POST" class="nav-link">
                <i class="fas fa-power-off nav-icon"></i>
                <p>LOGIN</p>
            </a>
        </li>
    </ul>
</ul>
@endif
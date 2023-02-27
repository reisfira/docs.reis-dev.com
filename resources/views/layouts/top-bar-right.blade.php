@if (Auth::check())
{{-- logout --}}
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user-circle"></i>
        <span class="pl-2">{{ auth()->user()->name }} @ {{ auth()->user()->email }}</span>
        <i class="fas fa-caret-down pl-2"></i>
    </a>
    <div class="dropdown-menu dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{ route('logout') }}" data-method="POST">
            <i class="fas fa-power-off mr-2"></i> Logout
        </a>
    </div>
</li>
@else
<li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">Login</a>
</li>
@endif

<li class="nav-item">
    @if(!isset($hasPreviousSession) || !$hasPreviousSession)
        <a class="nav-link {{ isset($active) ? 'active' : '' }} {{ isset($class) ? $class : '' }}" id="#{{ $nav }}" href="#{{ $tab }}" role="tab"
            @if(isset($enabled) && $enabled) data-toggle="pill" @endif>
            <span class="{{ isset($enabled) && $enabled ? '' : 'text-muted' }}">{{ $label }}</span>
        </a>
    @else
        <a class="nav-link {{ Session::has($tab) ? 'active' : '' }} {{ isset($class) ? $class : '' }}" id="#{{ $nav }}" data-toggle="pill" href="#{{ $tab }}" role="tab">{{ $label }}</a>
    @endif
</li>
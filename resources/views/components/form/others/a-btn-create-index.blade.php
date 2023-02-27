@php
    // $allowed = auth()->user()->hasPermissionTo($permission);
    $allowed = true;
@endphp

@if ($allowed)
    <a href="{{ $route }}" class="btn btn-primary form-control">
        <i class="fas fa-plus pr-2"></i>
        {{ $label ?? 'Create' }}
    </a>
@endif

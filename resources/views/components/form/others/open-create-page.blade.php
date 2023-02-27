@php
    // $allowed = auth()->user()->hasPermissionTo($permission);
    $allowed = true;
@endphp
@if($allowed)
<a href="{{ $route }}" class="floating-button btn btn-primary btn-circle btn-md">
    <i class="{{ isset($fa) ? $fa : 'fas fa-plus' }} text-white text-md"></i>
</a>
@endif

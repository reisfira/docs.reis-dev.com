@if ($deletable)
    <a class="btn btn-danger form-control" href="{{ $route }}" data-method="{{ $method ?? 'DELETE' }}" data-confirm="{{ $confirmation_prompt ?? 'Confirm delete?' }}">
        <i class="fas fa-trash pr-2"></i>
        Delete
    </a>
@else
    @php
        $popover_placement = "top";
        $popover_title = $title ?? 'Unable to delete';
        $popover_message = $message ?? 'This code already has existing transactions';
    @endphp
    <button type="button" class="btn btn-secondary form-control disabled"
        data-toggle="popover"
        title="{{ $popover_title }}"
        data-placement="{{ $popover_placement }}"
        data-content="{{ $popover_message }}">
            <i class="fas fa-trash pr-2"></i>
            Delete
    </button>
@endif

@php
    $disabled = (isset($disable_input) && $disable_input) ? true : false;
@endphp

@if (!$disabled)
<div class="pointer {{ $class ?? 'table-add' }}" data-toggle="popover" data-trigger="{{ $trigger ?? 'click' }}"
    data-title="{{ $title ?? '' }}" data-content="{{ $content ?? '' }}" data-context="{{ $context ?? '#content-datatable' }}">
    <span class="fa-stack" style="vertical-align: top;">
        <i class="fas fa-circle fa-stack-2x {{ $circle_color ?? 'text-white' }}"></i>
        <i class="fas fa-plus fa-stack-1x fa-inverse {{ $plus_color ?? 'text-blue' }}"></i>
    </span>
</div>
@endif
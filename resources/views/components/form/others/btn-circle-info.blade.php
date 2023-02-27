@php
    $disabled = (isset($disable_input) && $disable_input) ? true : false;
@endphp

@if (!$disabled)
<div class="pointer" data-toggle="popover" data-trigger="{{ $trigger ?? 'click' }}"
    data-title="{{ $title ?? '' }}" data-content="{{ $content ?? '' }}">
    <span class="fa-stack" style="vertical-align: top;">
        <i class="fas fa-circle fa-stack-2x" style="color: DimGrey;"></i>
        <i class="fas fa-times fa-stack-1x fa-inverse"></i>
    </span>
</div>
@endif
@php
    $disabled = (isset($disable_input) && $disable_input) ? true : false;
@endphp

@if (!$disabled)
<div class="pointer table-ajax-submit" data-toggle="popover" data-trigger="{{ $trigger ?? 'click' }}"
    data-title="{{ $title ?? '' }}" data-content="{{ $content ?? '' }}">
    <span class="fa-stack" style="vertical-align: top;">
        <i class="fas fa-circle fa-stack-2x" style="color: DodgerBlue;"></i>
        <i class="fas fa-arrow-right fa-stack-1x fa-inverse"></i>
    </span>
</div>
@else
<div class="disabled disabled-button">
    <span class="fa-stack" style="vertical-align: top;">
        <i class="fas fa-circle fa-stack-2x text-secondary"></i>
        <i class="fas fa-arrow-right fa-stack-1x fa-inverse"></i>
    </span>
</div>
@endif
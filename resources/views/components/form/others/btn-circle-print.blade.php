@php
    $disabled = (isset($disable_input) && $disable_input) ? true : false;
@endphp

@if (!$disabled)
<a href="{{ $print_route }}" data-toggle="popover" data-method="{{ $method ?? 'GET' }}" target="_blank">
    <span class="fa-stack" style="vertical-align: top;">
        <i class="fas fa-circle fa-stack-2x" style="color: DimGrey;"></i>
        <i class="fas fa-print fa-stack-1x fa-inverse"></i>
    </span>
</a>
@endif
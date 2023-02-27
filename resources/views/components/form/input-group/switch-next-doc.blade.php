<div class="input-group-append {{ isset($additionalClass) ? $additionalClass : '' }}" data-route="{{ $route }}">
    <div class="input-group-text {{ isset($color) ? $color : 'bg-dark-blue text-white' }} pointer">
        <small>
            @if (isset($append))
                <i class="{{ $append }}"></i>
            @endif
            @if (isset($text))
                {{ $text }}
            @endif
        </small>
    </div>
</div>

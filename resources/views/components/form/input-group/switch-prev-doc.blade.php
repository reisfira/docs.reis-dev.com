<div class="input-group-prepend {{ isset($additionalClass) ? $additionalClass : '' }}" data-route="{{ $route }}">
    <div class="input-group-text {{ isset($color) ? $color : 'bg-dark-blue text-white' }}">
        <small>
            @if (isset($prepend))
                <i class="{{ $prepend }}"></i>
            @endif
        </small>
    </div>
</div>

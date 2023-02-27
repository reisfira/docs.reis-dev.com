{{-- common use case is to put % at the end of an input --}}
<div class="input-group-append">
    <div class="input-group-text">
        <small>{!! $text ?? '%' !!}</small>
    </div>
</div>

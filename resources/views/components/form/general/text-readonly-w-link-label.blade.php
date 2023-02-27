<div class="form-group row">
    {!! Form::label($name, $label, ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-8 {{ isset($hint) ? '' : 'pt-2' }}">
        <a class="text-decoration-none" target="_blank" href="{{ $link }}">{{ $link_label }}</a>
        @if (isset($hint))
            {!! $hint !!}
        @endif
    </div>
</div>

@php
    $class = isset($class) ? $class : ''
@endphp

{!! Form::hidden('row_id[]', $id) !!}
<div class="btn-delete pointer mt-1 {{ $class }}" @if (isset($delete_url)) data-delete-url="{{ $delete_url }}" @endif>
    <span class="fa-stack" style="vertical-align: top;">
        <i class="fas fa-circle fa-stack-2x" style="color: Tomato;"></i>
        <i class="fas fa-times fa-stack-1x fa-inverse"></i>
    </span>
</div>

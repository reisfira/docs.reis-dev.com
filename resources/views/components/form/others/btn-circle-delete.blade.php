@php
    $class = isset($class) ? $class : '';
    $disabled = (isset($disable_input) && $disable_input) ? true : false;
    $hidden_input = isset($hidden_input) ? $hidden_input : 'dt_id';
@endphp

@if (!$disabled)
    @if (isset($id))
        {!! Form::hidden($hidden_input, $id, ['class' => 'dt-id']) !!}
    @endif

    <div class="btn-delete pointer {{ $class }}" @if (isset($delete_url)) data-delete-url="{{ $delete_url }}" @endif>
        <span class="fa-stack" style="vertical-align: top;">
            <i class="fas fa-circle fa-stack-2x" style="color: Tomato;"></i>
            <i class="fas fa-times fa-stack-1x fa-inverse"></i>
        </span>
    </div>
@endif

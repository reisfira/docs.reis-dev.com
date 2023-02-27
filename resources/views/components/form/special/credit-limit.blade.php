@php
    $row_gutter = isset($narrow_gutter) && $narrow_gutter ? 'mb-1' : '';
    $font_weight = isset($bold_label) ? 'font-weight-bold' : 'font-weight-normal';
@endphp
<div class="form-group row {{ $row_gutter }}">
    {!! Form::label('credit_limit', 'Credit Limit', ['class' => "col-sm-3 col-form-label {$font_weight}"]) !!}
    <div class="col-md-8">
        <label class="col-form-label {{ $font_weight }}">
            <span id="credit-used" class="pr-2 text-success">{{ $credit_used ?? '-' }}</span>
             /
             <span id="credit-limit" class="pl-2">{{ $credit_limit ?? '-' }}</span>
        </label>
    </div>
</div>

@php
    $row_gutter = isset($narrow_gutter) && $narrow_gutter ? 'mb-1' : '';
    $font_weight = isset($bold_label) ? 'font-weight-bold' : 'font-weight-normal';
    $required = (isset($is_required) && $is_required) ? 'required' : '';
@endphp
<div class="form-group row {{ $row_gutter }}">
    {!! Form::label('doc_no', 'Document No.', ['class' => "col-sm-3 col-form-label {$font_weight} {$required}"]) !!}
    <div class="col-sm-8">
        <div class="input-group">
            {{-- << --}}
            @include('components.form.input-group.switch-prev-doc', [
                'prepend' => 'fa fa-angle-double-left',
                'additionalClass' => 'first-document pointer',
                'color' => '',
                'route' => first_doc($table, $route, $current_id)
            ])

            {{-- < --}}
            @include('components.form.input-group.switch-prev-doc', [
                'prepend' => 'fa fa-angle-left',
                'additionalClass' => 'previous-document pointer',
                'color' => '',
                'route' => prev_doc($table, $route, $current_id)
            ])

            {{-- ! actual doc_no input --}}
            @include('components.form.special.doc-no-input', [ 'narrow_gutter' => false ])

            {{-- > --}}
            @include('components.form.input-group.switch-next-doc', [
                'append' => 'fa fa-angle-right',
                'additionalClass' => 'next-document pointer',
                'color' => '',
                'route' => next_doc($table, $route, $current_id)
            ])

            {{-- >> --}}
            @include('components.form.input-group.switch-next-doc', [
                'append' => 'fa fa-angle-double-right',
                'additionalClass' => 'latest-document pointer',
                'color' => '',
                'route' => last_doc($table, $route, $current_id)
            ])

            {{-- search --}}
            @include('components.form.input-group.fa-append', [ 'append' => 'fa fa-search', 'additionalClass' => 'search-document pointer' ])

        </div>
    </div>
</div>

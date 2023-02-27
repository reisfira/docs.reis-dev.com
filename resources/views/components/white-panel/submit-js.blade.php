<div class="float-right">
    @if (isset($custom_label))
        <button class="btn btn-primary btn-sm btn-submit-js mt-2 mr-4 pl-3 pr-3 {{ isset($custom_class) ? $custom_class : '' }}" data-target="{{ isset($target_form) ? $target_form : 'form' }}">
            <span class="d-block">{{ $custom_label }}</span>
        </button>
    @else
        <button class="btn btn-primary btn-sm btn-submit-js mt-2 mr-4 pr-3" data-target="{{ isset($target_form) ? $target_form : 'form' }}">
            <span class="d-block d-md-none"><i class="fa fa-share ml-1 mr-1"></i> Submit</span>
            <span class="d-none d-md-block"><i class="fa fa-share ml-1 mr-1"></i> Submit {{ isset($label) ? $label : '' }}</span>
        </button>
    @endif
</div>
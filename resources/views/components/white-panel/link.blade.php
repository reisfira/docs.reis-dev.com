<div class="float-right">
    @if (isset($custom_label))
        <a href="{{ isset($route) ? $route : '#' }}" class="btn btn-primary btn-sm mt-2 mr-4 pl-3 pr-3 {{ isset($custom_class) ? $custom_class : '' }}">
            <span class="d-block">{{ $custom_label }}</span>
        </a>
    @else
        <a href="{{ $route }}" class="btn btn-primary btn-sm mt-2 mr-4 pr-3">
            <span class="d-block d-md-none"><i class="fa fa-plus ml-1 mr-1"></i> Create</span>
            <span class="d-none d-md-block"><i class="fa fa-plus ml-1 mr-1"></i> Create {{ isset($label) ? $label : '' }}</span>
        </a>
    @endif
</div>

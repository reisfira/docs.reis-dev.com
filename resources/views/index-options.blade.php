<div class="form-group row">
    @if (isset($create_route))
        <div class="col-lg-3 text-left">
            {{-- <a class="btn btn-primary form-control" href="{{ $create_route }}">
                <i class="fas fa-plus pr-2"></i>
                {{ isset($create_label) ? $create_label : 'Create' }}
            </a> --}}
            <button class="btn btn-primary form-control" id="create-cost-centre"
                data-route="{{ $create_route }}" data-method="POST">
                <i class="fa fa-plus pr-2"></i> Create
            </button>
        </div>
    @endif
</div>
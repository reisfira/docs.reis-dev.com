<div class="general-ledgers-container">
    <div class="form-group row">
        <div class="col-md-9">
            <label for="gl_select" class="col-form-label">
                General Ledgers
                <small>You may copy over any number of existing ledgers to the new cost-centre</small>
            </label>
        </div>
        <div class="col-md-2">
            <div class="text-right">
                <button type="button" class="btn btn-sm btn-secondary text-white unselect-all">Unselect All</button>
                <button type="button" class="btn btn-sm btn-success text-white select-all">Select All</button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                @foreach ($general_ledgers as $account_code => $ledger)
                <div class="col-md-4 pt-2">
                    {!! Form::checkbox('gl_select[]', $account_code, false, ['class' => 'gl-checkbox col-form-label']) !!}
                    <span class="col-form-label pl-2">{{ $ledger }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

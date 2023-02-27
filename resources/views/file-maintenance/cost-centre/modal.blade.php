<div class="modal fade cost-centre-modal-template" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                {!! Form::open(['url' => route('file-maintenance.cost-centre.store'), 'method' => 'POST']) !!}
                    @csrf
                    <div class="form-group">
                        {!! Form::label('code', 'Code') !!}
                        {!! Form::text('code', null, [
                            'class' => 'form-control code',
                            'required',
                            'minlength' => 2,
                            'maxlength' => 5,
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', null, [
                            'class' => 'form-control description',
                            'rows' => '4',
                            'required'
                        ]) !!}
                    </div>

                    <div class="general-ledgers-container">
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="gl_select" class="col-form-label">
                                    General Ledgers
                                    <small>You may copy over any number of existing ledgers to the new cost-centre</small>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <div class="text-right">
                                    <button type="button" class="btn btn-sm btn-secondary text-white unselect-all">Unselect All</button>
                                    <button type="button" class="btn btn-sm bg-dark-green text-white select-all">Select All</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    {{-- @foreach ($generalLedgers as $acode => $generalLedger)
                                    <div class="col-md-6 pt-2">
                                        {!! Form::checkbox('gl_select[]', $acode, true, ['class' => 'gl-checkbox col-form-label']) !!}
                                        <span class="col-form-label pl-2">{{ $generalLedger }}</span>
                                    </div>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            {!! Form::hidden('_method', 'POST', ['id' => 'method']) !!}
                            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control save']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

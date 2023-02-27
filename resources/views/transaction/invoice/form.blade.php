<div class="card card-primary">
    <div class="card-header pointer" data-toggle="collapse" data-target=".hideable-section">FORM</div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <strong class="font-weight-bold small">ACCOUNT DETAILS</strong>
                @include('components.form.others.dbcr-template', [ 'dbcr_type' => 'debtor' ])

                <div class="hideable-section show">
                    <hr>
                    @include('components.form.general.text-w-label', [ 'name' => 'subject', 'label' => 'Subject', 'custom_size' => 'col-sm-9'])
                </div>
            </div>

            <div class="col-6">
                <strong class="font-weight-bold small">DOCUMENT DETAILS</strong>

                @include('components.form.special.doc-no', [ 'name' => 'doc_no', 'label' => 'Document No.', 'narrow_gutter' => true ])
                @include('components.form.general.date-w-label', [ 'name' => 'date_dmy', 'label' => 'Date', 'narrow_gutter' => true ])
                @include('components.form.general.text-w-label', [ 'name' => 'credit_term', 'label' => 'Credit Term', 'narrow_gutter' => true,])
                @include('components.form.special.credit-limit', [ 'narrow_gutter' => true ])

                <div class="hideable-section collapse show">
                    <div class="mt-4"></div>
                    @include('components.form.general.text-w-label', [ 'name' => 'batch_no', 'label' => 'Batch No.', 'narrow_gutter' => true,])
                    @include('components.form.general.text-w-label', [ 'name' => 'gl_description', 'label' => 'GL Desc.', 'narrow_gutter' => true,])
                    @include('components.form.general.text-w-label', [ 'name' => 'reason', 'label' => 'Reason', 'narrow_gutter' => true,])

                    <div class="mt-3"></div>
                    <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#header-footer-section">
                        HEADER &nbsp;&nbsp; | &nbsp;&nbsp; FOOTER
                    </button>
                </div>
            </div>
        </div>

        <div class="collapse" id="header-footer-section">
            <div class="row">
                <div class="col-6">
                    <strong class="font-weight-bold small">HEADER</strong>
                    @include('components.form.general.textarea', ['name' => 'header'])
                </div>
                <div class="col-6">
                    <strong class="font-weight-bold small">FOOTER</strong>
                    @include('components.form.general.textarea', ['name' => 'footer'])
                </div>
            </div>
        </div>
    </div>
</div>

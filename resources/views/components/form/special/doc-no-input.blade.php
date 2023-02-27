{{--
    @ for the document no. on the create page have 3 scenarios:
        1. when the document is on create page & document setup for this particular document is active
            ! don't allow edit (readonly) [ auto-generated ]
            > data fetched from document setup API

        2. when the document is on create page & document setup for this particular document is not active / set to manual
            ! must allow user input, and become a required field
            > data come from user input

        3. when the document is on edit page (no matter what type of document)
            ! don't allow edit (readonly) [ auto-generated ]
            > data fetched from $resource

    NOTE: at one time, the create page will only have $document_setup and edit page will only have $resource
    NOTE: the two can't coexist in the same page
--}}

@if (isset($document_setup) && $document_setup->is_active)
    {{-- * 1. when document is on create & auto --}}
    @include('components.form.general.text', [
        'name' => 'doc_no',
        'disable_input' => true,
        'value' => $document_setup->next_running_no_string,
    ])

@elseif (isset($resource))
    {{-- * 3. when document is on edit --}}
    @include('components.form.general.text', [
        'name' => 'doc_no',
        'disable_input' => true,
        'value' => $resource->doc_no,
    ])

@else
    {{-- * 2. when document is on create & manual --}}
    @include('components.form.general.text', [ 'name' => 'doc_no', 'is_required' => true ])

@endif
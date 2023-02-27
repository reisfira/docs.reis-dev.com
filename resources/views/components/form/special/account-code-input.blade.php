{{--
    @ for the document no. on the create page have 2 scenarios:
        1. when the document is on create page
            ! must allow user input, and become a required field
            > data come from user input

        2. when the document is on edit page (no matter what type of document)
            ! don't allow edit (readonly) [ auto-generated ]
            > data fetched from $resource

    NOTE: at one time, the create page will only have $document_setup and edit page will only have $resource
    NOTE: the two can't coexist in the same page
--}}

@if (isset($resource))
    {{-- * 3. when document is on edit --}}
    @include('components.form.general.text', [
        'name' => 'account_code',
        'readonly_input' => true,
        'value' => $resource->account_code,
    ])

@else
    {{-- * 1. when document is on create --}}
    @include('components.form.general.text', [ 'name' => 'account_code', 'form_class' => 'inputmask-alphanumeric-allcaps', 'is_required' => true ])

@endif
@php
    /**
     * NOTE: relating to $apply_id
     * if this radio button is used inside a dynamically generated modal (created from javascript), then can skip the $apply_id parameter
     * otherwise, if this radio button is used on the page itself; normally, please set the $apply_id to true
     *
     * > reason:
     *      because 'id' in an element is unique, so if we $apply_id in the modal, when cloning the modal element, the id will be cloned as well
     *      resulting with two element with same 'id' in the html - which will give us a buggy interface
     * */

    $class = isset($form_class) ? $form_class : ''
@endphp

<div class="icheck-primary">
    {!! Form::radio($name ?? 'option', $value ?? 0, isset($checked) && $checked, [
        isset($apply_id) && $apply_id ? "id={$id}" : '',
        'class' => "input-radio {$class}",
        'data-id' => $id,
    ]) !!}

    <label for="{{ $id }}">
        <span class="pl-2">{{ $label }}</span>
    </label>
</div>

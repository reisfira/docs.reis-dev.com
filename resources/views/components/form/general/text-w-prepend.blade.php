@php
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $faClass = isset($faClass) ? $faClass : 'fa fa-search';
    $appendClass = isset($appendClass) ? $appendClass : '';
@endphp
<div class="input-group">
    @include('components.form.input-group.text-prepend', [ 'text' => $prepend ])
    {!! Form::text($name, isset($value) ? $value : null, [
        'class' => 'form-control '.$class, $disabled,
        'data-input-context' => isset($inputContext) ? $inputContext : ".{$class}",
    ]) !!}
</div>
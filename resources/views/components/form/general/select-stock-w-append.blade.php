@php
    $class = isset($form_class) ? $form_class : $name;
    $disabled = (isset($disable_input) && $disable_input) ? 'disabled' : '';
    $required = (isset($required_input) && $required_input) ? 'required' : '';
    $faClass = isset($faClass) ? $faClass : 'fa fa-search';
    $appendClass = isset($appendClass) ? $appendClass : '';
@endphp
<div class="input-group">
    {!! Form::select($name, $array, isset($value) ? $value : null, [
        'class' => 'form-control form-control-xs '.$class, $disabled,
        'placeholder' => '-',
        'data-input-context' => isset($inputContext) ? $inputContext : ".{$class}",
    ]) !!}
    @include('components.form.input-group.fa-append', [ 'append' => $faClass, 'additionalClass' => 'pointer '.$appendClass ])
</div>
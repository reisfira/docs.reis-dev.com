@php $class = isset($form_class) ? $form_class : $name @endphp
{!! Form::text($name, isset($value) ? $value : null, ['class' => 'form-control inputmask-decimal '.$class, 'disabled']) !!}
{!! Form::hidden($name, isset($value) ? $value : null, ['class' => $class]) !!}

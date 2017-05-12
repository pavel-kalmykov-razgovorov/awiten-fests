@component('mail::message')
# Bienvenido a Awiten Fest

Se ha registrado {{$name}} con el usuario {{$user}}

@component('mail::button', ['url' => '{{$actionUrl}}'])
Validar Usuario
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent

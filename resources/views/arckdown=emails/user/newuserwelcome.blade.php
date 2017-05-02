@component('mail::message')
# Bienvenido a Awiten Fest

Preparate para *disfrutar* de los **mejores festivales**.

@component('mail::button', ['url' => '{{$actionUrl}}'])
Validar Usuario
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent

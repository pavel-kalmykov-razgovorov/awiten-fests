@component('mail::message')
# Admin Debes validar al siguiente usuario:

Se ha registrado [{{$name}}] con el usuario [{{$name}}] 
Con el correo [{{$name}}] 

@component('mail::button', ['url' => '{{$actionUrl}}'])
Validar Usuario
@endcomponent


@component('mail::subcopy')
Si tienes problemas al hacer clic en el boton, copia y pega la siguiente URL en tu navegador web: $actionUrl
@endcomponent
@endcomponent

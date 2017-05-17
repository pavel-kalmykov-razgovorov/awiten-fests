@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hola!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@if (isset($actionText))
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => 'green'])
{{ $actionText }}
@endcomponent

@endif


{{-- Outro Lines --}}
@foreach ($outroLines as $line)
@if (strpos($line, 'details') === false) {
    @component('mail::button', ['url' => $line, 'color' => 'red'])
    Rechazar
    @endcomponent 
}
@else{
    @component('mail::button', ['url' => $line, 'color' => 'blue'])
    Mostrar
    @endcomponent 
}
@endif
@endforeach

<!-- Salutation -->
@if (! empty($salutation))
{{ $salutation }}
@else
Gracias,<br>{{ config('app.name') }}
@endif

<!-- Subcopy -->
@if (isset($actionText))
@component('mail::subcopy')
Si tienes problemas al hacer clic en el boton "{{ $actionText }}" , copia y pega la siguiente URL en tu navegador web: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endif
@endcomponent

@component('mail::message')
Hola, {{ $user->name }}, has olvidado tu contraseña?

<p>No te preocupes, puedes restablecer tu contraseña.</p>

@component('mail::button', ['url' => url('reset/' . $user->remember_token)])
Restablecer contraseña
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent

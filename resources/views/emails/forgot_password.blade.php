@component('mail::message')

Hola, {{ $user->name }},  has olvidado tu contraseña?

<p>No te preocupes, puedes restablecer tu contraseña.</p>

@component('mail::button', ['url' => 'reset/'.$user->remember_token])
Restablecer contraseña
@endcomponent

Thanks, <br>
{{ config('app.name') }}
@endcomponent

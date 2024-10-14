@component('mail::message')
Hello {{ $user->name }},

<p>We understand it happen</p>

@component('mail::button', ['url' => url('reset/' . $user->remember_token)])
Reset your Password
@endcomponent

<p>Contact us if you have issues recovering your password</p>

thansk<br>
{{ config('app.name') }}
@endcomponent
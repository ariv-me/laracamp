@component('mail::message')
# Welcome

Hi, {{ $user->name }}

<br>
Welcome to laracamp, your account has been created successfully. Now you can choose your best match camp!

@component('mail::button', ['url' => 'login'])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

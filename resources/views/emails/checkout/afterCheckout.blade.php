@component('mail::message')
# Register Camp : {{ $checkout->Camp->title }}

<br>
Thank you for register on <b>{{ $checkout->Camp->title }}</b>, please see payment instruction by click the button below

@component('mail::button', ['url' => 'dashboard'])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

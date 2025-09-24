@component('mail::message')
# Hello {{ $user->name }},

Your account has been created.

**Email:** {{ $user->email }}  
**Password:** {{ $password }}

Please login and change your password immediately.

@component('mail::button', ['url' => route('login')])
Login Now
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
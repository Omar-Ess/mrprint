@component('mail::message')
# Message du formulaire de contact


@if ($mailData["name"])
Nom : {{$mailData["name"]}}
<br>
@endif
@if ($mailData["phone"])
Téléphone : {{$mailData["phone"]}}
<br>
@endif
Email : {{$mailData["email"]}}


@component('mail::panel')
{{$mailData["message"]}}
@endcomponent


Merci<br>
{{ config('app.name') }}
@endcomponent

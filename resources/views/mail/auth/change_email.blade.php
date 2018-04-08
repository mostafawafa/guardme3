@component('mail::message')

  You have requested to change your current email address to this email address
  <br>

  @component('mail::button', ['url' => $url])

    Click here to verify your new email address

  @endcomponent
  <br>

  Thanks,
  <br>
  {{ config('app.name') }}

@endcomponent
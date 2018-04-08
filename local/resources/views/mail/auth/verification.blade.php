@component('mail::message')

  One last step!
  <br>

  @component('mail::button', ['url' => $url])

    Click here to verify your account

  @endcomponent
  <br>

  Thanks,
  <br>
  {{ config('app.name') }}

@endcomponent
@component('mail::message')

  One last step!
  <br><br>

  @component('mail::button', ['url' => $url])

    Click here to verify your account

  @endcomponent
  <br><br>

  Thanks,
  <br><br>
  {{ config('app.name') }}

@endcomponent
@extends('layouts.app')

@section('content')
@include('style')
@include('header')
<div class="headerbg">
  <div class="row">
    <div class="col-md-12" align="center">
      <h1>{!! session('confirmation_title') !!}</h1>
    </div>
  </div>
</div>
<div class="height30"></div>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div style="margin-top: 40px; margin-bottom: 40px;">
            {!! session('confirmation_message') !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('footer')

@endsection
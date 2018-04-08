<!DOCTYPE html>
<html lang="en">
<head>

<meta name="csrf-token" content="{{ csrf_token() }}">


   @include('style')
   @stack('styles')
	
<style type="text/css">
.noborder ul,li { margin:0; padding:0; list-style:none;}
.noborder .label { color:#000; font-size:16px;}
</style>

	<script>
		   window.verificationConfig =  {
			  url  : "{{ url('/') }}"
		  }
	  </script>

</head>
<body>

    <?php $url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
    
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="clearfix"></div>
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>Phone Verfication</h1></div>
	 </div>
		 
	 
	<div class="container" id='phone'>
        @yield('content')
	
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

	  @include('footer')
	  
	 

	  @stack('scripts')
</body>
</html>
 
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
   @stack('styles')
	
<style type="text/css">
.noborder ul,li { margin:0; padding:0; list-style:none;}
.noborder .label { color:#000; font-size:16px;}
</style>



</head>
<body>

    <?php $url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
    
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>Tickets</h1></div>
	 </div>
	<div class="container">
		 
	 
	<div class="container">
        @yield('content')
	
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

	  @include('footer')
	  

	  @stack('scripts')
</body>
</html>
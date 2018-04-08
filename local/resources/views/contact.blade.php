<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
    
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1><?php echo $contact[0]->page_title;?></h1></div>
	 </div>
	<div class="container">
	 
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12">
	
	
	<div class="col-md-6">
	<form class="form-horizontal" role="form" method="POST" action="{{ route('contact') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
	
	<div class="col-md-12 cform">
	
          <div class="col-lg-6 col-md-6 col-sm-6">
            <label>Name<span class="star">*</span></label>
            <input type="text" value=""  class="form-control validate[required] text-input" id="name" name="name" >
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <label>Email<span class="star">*</span> </label>
            <input type="text" value=""  class="form-control validate[required,custom[email]] text-input" id="email" name="email" >
          </div>
		  
          <div class="col-lg-6 col-md-6 col-sm-6">
            <label>Phone No<span class="star">*</span></label>
            <input type="text" value=""  class="form-control validate[required] text-input" id="phone_no" name="phone_no" >
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <label>Message<span class="star">*</span> </label>
            <input type="text" value=""   class="form-control validate[required] text-input" id="msg" name="msg">
          </div>
		  
          <div class="col-lg-6">
            <input type="submit" class="btn btn-primary" value="Send">
          </div>
		  
		 </div> 
        </form>
	
	
	
	</div>
	
	<div class="col-md-6">
	<?php
	echo trim($contact[0]->page_desc,"'");
	?>
	</div>
	
	</div>
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
	  <?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
		</script>
    </div>
	 <?php } ?>
</body>
</html>
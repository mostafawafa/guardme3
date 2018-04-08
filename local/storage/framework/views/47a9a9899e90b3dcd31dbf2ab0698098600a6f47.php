<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
	?>
<!DOCTYPE html>
<html lang="en">
<head>
   
   

   <?php echo $__env->make('style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	




</head>
<body>

   

    <!-- fixed navigation bar -->
    <?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- slider -->
	
	
	
    <div id="banner">
	<div id="overlays"></div>
	<?php if(!empty($setts[0]->site_banner)){?>
      <img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_banner;?>" class="img-responsive bannerheight">
	<?php } else {?>
	<img src="<?php echo $url;?>/img/banner.jpg" class="img-responsive bannerheight">
	<?php } ?>
	
    </div>
	
	<div class="bannertxt">
	 
		<div class="col-md-12" align="center">
		<div class="row">
		
		<h1 class="headingcolor"> Manned Security Freelance Marketplace. </h1>
		</div>
		
		
		<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<h4 class="headingcolor"> Looking for security personnel in the UK? Get accesss to thousands of vetted SIA security personnel. </h4>
		</div>
		<div class="col-md-3"></div>
		</div>
		
		
		
		
		</div>
		
		
		   
		
		<div class="col-md-12 form_move" align="center">
		<div class="col-md-3"></div>
		<form action="<?php echo e(route('search')); ?>" method="post" enctype="multipart/form-data" id="formID">
		<div class="col-md-6">
		<?php echo csrf_field(); ?>

		<div class="col-md-8 paddingoff">
		
		<input type="text" name="search_text" class="searchtext validate[required]" id="search_text" placeholder="Start by entering a location">
		
		</div>
		<div class="col-md-4 paddingoff"><input type="submit" name="search" class="searchbtn" value="Search For Security"></div>
		
		
		</div>
		</form>
		<div class="col-md-3"></div>
		
		
		</div>
		
		
	</div>
	
	<script>
   $(document).ready(function() {
    src = "<?php echo e(route('searchajax')); ?>";
     $("#search_text").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    response(data);
                   
                }
            });
        },
        minLength: 1,
       
    });
});
</script>
	
	
    
	
	<div class="icons">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<ul class="paddoff customcolor">
	<?php foreach ($services as $service) {
     $subserve=strtolower($service->name);
			$result_url = preg_replace('/[ ,]+/', '-', trim($subserve));
	?>
	<li>
	<div class="move10">
	<?php 
					   $servicephoto="/servicephoto/";
						$path ='/local/images'.$servicephoto.$service->image;
						if($service->image!=""){
						?>
	<a href="<?php echo $url; ?>/subservices/<?php echo $result_url;?>"><img src="<?php echo $url.$path;?>" border="0" width="50"></a>
	<?php } else { ?>
						  <a href="<?php echo $url; ?>/subservices/<?php echo $result_url;?>"><img src="<?php echo $url.'/local/images/noimage.jpg';?>" border="0" width="50"></a>
						 <?php } ?>
	
	</div>
	
	<div><a href="<?php echo $url; ?>/subservices/<?php echo $result_url;?>" class="serviceclr"><?php echo $service->name;?></a></div>
	</li>
	<?php } ?>
	
	
	<li>
	<div class="move10">
	<a href="<?php echo $url; ?>/subservices"><img src="<?php echo $url."/local/images/more.png";?>" border="0" width="50"></a>
	</div>
	<div><a href="<?php echo $url; ?>/subservices" class="serviceclr">More</a></div>
	</li>
	
	
	</ul>
	</div>
	<div class="col-md-2"></div>
	</div>
	
	
	<div class="ashbg">
	
	<div class="clearfix"></div>
	


	
	
	<!-- main container -->
	
	
	
	
	<div class="clearfix"></div>
	
	</div>
	
	<div class="clearfix"></div>
	
	
	<div class="works">
	<div class="container">
	 <div class="col-md-12" align="center"><h1>How it works</h1></div>
	 <div class="height30"></div>
	<div class="row">
	<div class="col-md-12">
	<div class="col-md-1"></div>
	<div class="col-md-10">
	<div class="col-md-6">
	<img src="img/how-it-works.png" class="img-responsive" alt="">
	</div>
	
	<div class="col-md-6">
	<h3 class="">1. Tell us what you need</h3>
                <p class="">First, select required professional service about what type of pro you’re looking for.</p>
                                <h3 class="">2. Review service providers</h3>
                <p class="">Within seconds, you’ll receive expert service providers profile with their ratings. choose one among them.</p>
                                <h3 class="">3. Hire the right pro</h3>
                <p class="">Compare prices, profiles, and reviews, then hire the pro that’s right for you.</p>
	
	</div>
	</div>
	<div class="col-md-1"></div>
	
	</div>
	
	</div>
	
	</div>
	<div class="clearfix"></div>
	</div>
	
	
	
	
	<div class="clearfix"></div>
	
	
	<div class="blog">
	<div class="clearfix"></div>
	<div class="container">
	 <div class="col-md-12" align="center"><h1>Customers use to get millions of projects done<br/> quickly and easily</h1></div>
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12">
	<div class="col-md-1"></div>
	
	
	
	
	<div class="col-md-10 nopadding testimons">
	
	<div id="flexiselDemotesti">
	
	<?php foreach($testimonials as $testimonial){?>
    <li>
	<div class="weightbg">
	<div class="innerbg">
	<p><?php echo $testimonial->description;?></p>
	</div>
	<div class="user">
	<?php 
					   $testimonialphoto="/testimonialphoto/";
						$path ='/local/images'.$testimonialphoto.$testimonial->image;
						if($testimonial->image!=""){
						?>
	<img src="<?php echo $url.$path;?>" class="img-responsive" alt="">
	<?php } else {?>
						<img src="<?php echo $url.'/local/images/nophoto.jpg';?>"  class="img-responsive">
						<?php } ?>
	<div class="user-txt">
	
	<h5><?php echo $testimonial->name;?></h5>
	</div>
	</div>
	</div>
	</li>
	<?php } ?>
	
	
   
	
	
	</div>
	</div>
	
	
	
	
	
	
	<?php /* ?><div class="col-md-10">
	
	<div class="col-md-4">
	<div class="blog-wightbg">
	<img src="img/thumb/p5.jpg" class="img-responsive" alt="">
	<p>Gary was friendly, professional, and his work was incredible. He helped us create a design we loved within our budget. 
	Whole Foods customers say how much the mural brightens our space</p>
	<div class="clear"></div>
	<div class="user">
	<img src="img/thumb/user1.jpg" class="img-responsive" alt="">
	<div class="user-txt">
	<h4>The PRO</h4>
	<h5>Mickey Peter</h5>
	</div>
	</div>
	
	
	</div>
	</div>
	
	
	<div class="col-md-4">
	<div class="blog-wightbg">
	<img src="img/thumb/p5.jpg" class="img-responsive" alt="">
	<p>Gary was friendly, professional, and his work was incredible. He helped us create a design we loved within our budget. 
	Whole Foods customers say how much the mural brightens our space</p>
	<div class="clear"></div>
	<div class="user">
	<img src="img/thumb/user1.jpg" class="img-responsive" alt="">
	<div class="user-txt">
	<h4>The PRO</h4>
	<h5>Mickey Peter</h5>
	</div>
	</div>
	
	
	</div>
	</div>
	
	
	
	<div class="col-md-4">
	<div class="blog-wightbg">
	<img src="img/thumb/p5.jpg" class="img-responsive" alt="">
	<p>Gary was friendly, professional, and his work was incredible. He helped us create a design we loved within our budget. 
	Whole Foods customers say how much the mural brightens our space</p>
	<div class="clear"></div>
	<div class="user">
	<img src="img/thumb/user1.jpg" class="img-responsive" alt="">
	<div class="user-txt">
	<h4>The PRO</h4>
	<h5>Mickey Peter</h5>
	</div>
	</div>
	
	</div>
	</div>
	
	</div><?php */?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="col-md-1"></div>
	</div>
	
	</div>
	 
	</div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	</div>
	
	
	
	
    
	
	<div class="getmore">
	<div class="col-md-12">
	<div class="col-md-1"></div>
	<div class="col-md-10">
	<div class="col-md-6"></div>
	<div class="col-md-6">
	<h2>Get more done anytime, anywhere</h2>
	<p>Send project requests, get quotes, and hire the right pro with the free Thumbtack app for iPhone.</p>
	<div class="height40"></div>
	<?php /* ?><div class="">
	<div class="col-md-8 paddingoff">
		
		<input type="text" name="search" class="searchtext" placeholder="Phone Number">
		</div>
		<div class="col-md-4 paddingoff"><input type="button" name="search" class="searchbtn" value="Text me a link"></div>
		</div><?php */?>
		
		<div class="">
	<div class="col-md-4 paddingoff clearfixed">
	<a href="#"><img src="<?php echo $url.'/local/images/google.png';?>" class="img-responsive" alt=""></a>
	</div>
	<div class="col-md-4 paddingoff">
	<a href="#"><img src="<?php echo $url.'/local/images/apple.png';?>" class="img-responsive" alt=""></a>
	</div>
	<div class="col-md-4"></div>
	</div>
		
	<div class="height20"></div>
	<?php /* ?><div class="col-md-12 app">
	<div class="col-md-8"></div>
	<div class="col-md-4 moveright"><img src="img/app.png" class="img-responsive" alt=""></div>
	</div><?php */?>
	
	</div>
	</div>
	
	<div class="col-md-1"></div>
	</div>
	
	</div>
	
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="container">
	 <div class="col-md-12" align="center"><h1>Thousands of professionals are growing their<br/> businesses</h1></div>
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12">
	<div class="col-md-1"></div>
	<div class="col-md-10">
	<div class="col-md-8 paddingoff">
	<img src="img/v1.jpg" class="img-responsive big firstsize" alt="">
	<div class="titlesection">
	<h3>Caitlin Sarah</h3>
	<span>Designer</h3>
	</div>
	
	</div>
	
	<div class="col-md-4 paddingoff left10">
	<div class="justmove"><img src="img/v2.jpg" class="img-responsive" alt="">
	<div class="titlesection">
	<h3>Sophie Olivia</h3>
	<span>Developer</h3>
	</div>
	</div>
	<div class="height10"></div>
	<div class="justmove"><img src="img/v3.jpg" class="img-responsive" alt="">
	
	<div class="titlesections">
	<h3>William Mark</h3>
	<span>Analyst</h3>
	</div>
	</div>
	</div>
	</div>
	<div class="col-md-1"></div>
	
	</div>
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>

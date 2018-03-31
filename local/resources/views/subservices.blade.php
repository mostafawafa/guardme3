<?php
/*if (Auth::check())
{
	
}
else
{
	//redirect()->route('login');
	
	echo Redirect::to('login');
}*/
?>   
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




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
	 <div class="col-md-12" align="center"><h1><?php if(!empty($service_id[0]->name)){?><?php echo $service_id[0]->name; ?><?php } else { ?>Services<?php } ?></h1></div>
	 </div>
	
	
	<div class="container">
	
	 <div class="height30"></div>
	 <div class="row">
	 
	 
	 
	 
	 
	 
	


 





   <?php if(!empty($id)){?>
   
   <?php if(!empty($serv_count)){?>
   
   <div id="products" class="row list-group">
   
   <?php foreach($services as $service){
		$subview=strtolower($service->subname);
			$results = preg_replace('/[ ,]+/', '-', trim($subview));
		?>
        <div class="item  col-md-3 serv">
            <div class="thumbnail">
                
				<?php 
           $subservicephoto="/subservicephoto/";
						$path ='/local/images'.$subservicephoto.$service->subimage;
						if($service->subimage!=""){
						?>
	<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.$path;?>" class="group list-group-image img-responsive" /></a>
						<?php } else {?>
						<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="group list-group-image img-responsive"></a>
						<?php } ?>
				
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        <a href="<?php echo $url; ?>/search/<?php echo $results;?>"><?php echo $service->subname;?></a></h4>
                   
                    
                </div>
            </div>
        </div>
        <?php } ?>
	   
			
    </div>

   <?php  } ?>
   
   <?php if(empty($serv_count)){?>
   
   
   <div class="col-md-12 noservice" align="center">No services found!</div>
   
   <?php } ?>
	
   <?php } ?>	
   
   
   <?php if(empty($id)){?>
   
   <div id="products" class="row list-group">
   
   <?php foreach($services as $service){
		$subview=strtolower($service->subname);
			$results = preg_replace('/[ ,]+/', '-', trim($subview));
		?>
        <div class="item  col-md-3 serv">
            <div class="thumbnail">
                
				<?php 
           $subservicephoto="/subservicephoto/";
						$path ='/local/images'.$subservicephoto.$service->subimage;
						if($service->subimage!=""){
						?>
	<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.$path;?>" class="group list-group-image img-responsive" /></a>
						<?php } else {?>
						<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="group list-group-image img-responsive"></a>
						<?php } ?>
				
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        <a href="<?php echo $url; ?>/search/<?php echo $results;?>"><?php echo $service->subname;?></a></h4>
                   
                    
                </div>
            </div>
        </div>
        <?php } ?>
	   
			
    </div>
	
   <?php } ?>


			                                  
	
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>

   

   @include('style')
	




</head>
<body>

    <?php 
	
	$url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
    
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>Shop</h1></div>
	 </div>
	<div class="">
	 
	 
	 
	
	 
	 
	 
	 
	 
	 
	 <?php if($shopcount==1){?>
	 <div class="profile shop">
		
		
		<div class="fb-profile">
	<?php 
					   $shopheader="/shop/";
						$path ='/local/images'.$shopheader.$shop[0]->cover_photo;
						if($shop[0]->cover_photo!=""){
						?>
        <img align="left" class="fb-image-lg" src="<?php echo $url.$path;?>" alt="cover banner"/>
						<?php } else { ?>
						<img align="left" class="fb-image-lg" src="<?php echo $url.'/local/images/no-image-big.jpg';?>" alt="cover banner"/>
						<?php } ?>
		
		<?php $shopphoto="/shop/";
						$paths ='/local/images'.$shopphoto.$shop[0]->profile_photo;
						if($shop[0]->profile_photo!=""){?>
        <img align="left" class="fb-image-profile thumbnail" src="<?php echo $url.$paths;?>" alt="Profile Photo"/>
						<?php } else { ?>
						<img align="left" class="fb-image-profile thumbnail customwidth" src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="Profile Photo"/>
						<?php } ?>
        <div class="fb-profile-text">
            <h1><?php echo $shop[0]->shop_name;?></h1>
            <p><?php echo $shop[0]->address;?></p>
        </div>
    </div>
		
		<div class="container">
	<div class="row">
		
        <div class="col-md-12">
                
				
				<div class="clearfix"></div>
    

				
				
				
    <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a href="#inbox" data-toggle="tab"><span class="lnr lnr-user blok"></span> Profile</a></li>
      <li><a href="#sent" data-toggle="tab"><span class="lnr lnr-cog blok"></span> Services</a></li>
      <li><a href="#assignment" data-toggle="tab"><span class="lnr lnr-star blok"></span> Reviews</a></li>
      
    </ul>
    
    <div class="tab-content">
	
	
	<div class="tab-pane active" id="inbox">
       <div class="clearfix"></div>
	   <div class="col-md-12">
		<div class="col-md-6">
			<h3>Description</h3>
			<p><?php echo $shop[0]->description;?></p><br/>
		</div>	
		<div class="col-md-6 contact_address">
			<h3>Contact Address</h3>
				<p><span class="lnr lnr-map-marker"></span> <?php echo  ' '.$shop[0]->address;?><br>
				<?php echo $shop[0]->city;?> - <?php echo $shop[0]->pin_code;?><br>
				<?php echo $shop[0]->state;?><br>
				<?php echo $shop[0]->country;?></p>
								<p> <span class="lnr lnr-clock"></span> <?php echo $stime;?> - <?php echo $etime;?></p> 
			</div>
				</div>
				
				<div class="col-md-12">
				<div class="col-md-6 working_day">
								<h3>Shop Working Days</h3>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="0") echo "Sunday"; }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="1") echo "Monday"; }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="2") echo "Tuesday"; }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="3") echo "Wednesday"; }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="4") echo "Thursday"; }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="5") echo "Friday "; }?></p>
					<p><?php for($i=0;$i<$lev;$i++){ if($sel[$i]=="6") echo "Saturday"; }?></p>
					
				</div>
			
			<div class="col-md-6">
				<h3>Shop Status </h3>
				<p><?php echo $shop[0]->status;?></p>
			</div>
			</div>

	   
	   
      </div>
     
	 
	 
	 
	 
       
      <div class="tab-pane" id="sent">
           <div class="clearfix"></div>
		   
		    <div class="col-md-12">
			
			<?php foreach($viewservice as $sellerservice){?>
			
			<div class="col-md-3">
			<div class="services">
				<h4><?php echo $sellerservice->subname;?></h4>
				<h5><span class="icon_info" aria-hidden="true"></span>
					<?php echo $sellerservice->price;?> &nbsp; <?php echo $setting[0]->site_currency;?> | <?php echo $sellerservice->time;?> hour(s)</h5>
			</div>
			</div>
			<?php } ?>
			
			</div>
		   
		  
		   
		   
		   
      </div>
      
	  
	  
	  
	  
      
      <div class="tab-pane" id="assignment">
	 <div class="clearfix"></div>
	 
	 <?php if($rating_count==0) {?>
	 <div class="row">
	 <div class="col-md-12">
	 <div class="rating">
	 No Reviews
	 </div>
       
		</div>
	</div>	
	 <?php } else { ?>
	 
	 <div class="row">
	 <div class="col-md-12">
	 <?php foreach($rating as $newrating){?>
	 <div class="rating">
		 <?php
		if($newrating->rating=="")
		{
			$starpath = '/local/images/nostar.png';
		}
		else {
		$starpath = '/local/images/'.$newrating->rating.'star.png';
		}
		?>
		<img src="<?php echo $url.$starpath;?>" class="star_rates" alt="rated <?php if($newrating->rating==""){ echo "0"; } else { echo $newrating->rating; }?> stars" title="rated <?php if($newrating->rating==""){ echo "0"; } else { echo $newrating->rating; }?> stars" />  - &nbsp; <?php  echo $newrating->name;?>
		<h4> <?php echo $newrating->comment; ?></h4>
		<?php
		
		?>
		  
		</div>
	 <?php } ?>
	 
	 </div>
	 </div>
	 
	 <?php } ?>
	 
	 
		
		
     </div>
     
     
    
    
        
    </div>
	
	<div class="clearfix"></div>
	
	<div class="form-group">
		<div class="row">
		<div class="col-md-12">
			<div>
					<a href="<?php echo $url;?>/editshop/<?php echo $shop[0]->id;?>" class="btn btn-success btn-md radiusoff">Edit Shop</a>
					<a href="<?php echo $url;?>/services" class="btn btn-danger btn-md radiusoff">Edit Services</a>
					
				</div>
			</div>	
				
		</div>
	</div>
	

	

     </div>
	</div>
    
    
</div>





            
    
		
		
		
		
		
	</div>	
	
	
	 <?php } ?>
	 
	 
	 
	
	 
	 
	
	
	
	
	 
	 
	 
	 
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>
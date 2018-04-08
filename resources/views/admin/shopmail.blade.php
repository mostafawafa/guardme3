<!DOCTYPE html>
<html lang="en">
<head>

    <title>Shop Request</title>

  
	




</head>
<body>

   

    
    

	
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="container">
	 <h1><?php echo $site_name;?> - Shop</h1>
	 
	 
	
	 
	 
	 <div class="clearfix"></div>
	 
	 <div class="row profile shop">
		<div class="col-md-6">
	 
	 
	
	<div id="outer" style="width: 100%;margin: 0 auto;background-color:#cccccc; padding:10px;">  
	
	
	<div id="inner" style="width: 80%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;
	font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px; padding:10px;">
			<?php if(!empty($site_logo)){?>
			<div align="center"><img src="<?php echo $site_logo;?>" border="0" alt="logo" /></div>
			<?php } else { ?>
			<div align="center"><h2><?php echo $site_name;?></h2></div>
			<?php } ?>
			
			
			
			
			
			<h3> Your Shop approved Successfully</h3>
			<p> Shop Name - <?php echo $shop_name;?></p>
			<p> Address - <?php echo $address;?></p> 	
			<p> City - <?php echo $city;?></p> 	
			<p> Pin Code - <?php echo $pin_code;?></p> 	
			<p> Country - <?php echo $country;?></p> 	
			<p> State - <?php echo $state;?></p> 	
			<p> Shop Phone No - <?php echo $shop_phone_no;?></p> 	
			<p> Description - <?php echo $description;?></p> 	
				
			
			
			
	
	
	
	
	</div>
	</div>
	 
	 
	 
	
	 
	 
	
	
	
	
	 
	 
	 
	 
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	
	
	
	</div>
	
	</div>
	

      
</body>
</html>
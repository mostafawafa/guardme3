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
	
	<div class="clearfix"></div>
	
	
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>Booking Details</h1></div>
	 </div>
	
	<div class="container">
	<div class="clearfix"></div>
	
	
	

	<div class="col-md-6">
		<h4><?php echo $shop[0]->shop_name;?></h4>
		
				
			<p><i class="fa fa-calendar-o" aria-hidden="true"></i> Booking Date - <?php echo $booking[0]->booking_date; ?></p>
			<p> <i class="fa fa-clock-o" aria-hidden="true"></i>  Booking Time - <?php echo $final_time; ?></p>
		
	</div>
	
	
	<div class="col-md-6 service_style">
	
	 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Selected Services</th>
					<th>Price</th>
					 <th>Service Charge</th>
                </tr>
            </thead>
			<tbody>			
			<tr>
			
				<td><?php echo $ser_name;?></td>
				<td><?php echo $price; ?></td>
				<td> <?php echo $commission_amt; ?> (<?php echo $commission_mode; ?>)</td>

			</tr>
			<td class="total-charge" colspan="1">TOTAL CHARGES</td><td class="total-charge"><?php echo $sum;?>&nbsp;<?php echo $currency;?></td>
			</tbody>
															
            </table>
			
	</div>
	
	</div>
	<?php /*$enc = Crypt::encryptString($sum);
	$decrypted = Crypt::decryptString($enc);
	
	$admin_enc = Crypt::encryptString($admin_email);*/
	// echo $enc;
	?>
	<form class="" name="admin_s" id="formID" method="post" enctype="multipart/form-data" action="{{ route('booking_info') }}">
	{!! csrf_field() !!}
	<div class="container">
<div class="col-md-8"></div>

<div class="col-md-4">
<input type="hidden" name="price" value="<?php echo $sum;?>">

<input type="hidden" name="currency" value="<?php echo $currency;?>">


<input type="hidden" name="admin_email" value="<?php echo $adminemail;?>">

<input type="hidden" name="user_email" value="<?php echo $useremail;?>">

<input type="hidden" name="usernamer" value="<?php echo $usernamer;?>">

<input type="hidden" name="userphone" value="<?php echo $userphone;?>">


<input type="hidden" name="seller_email" value="<?php echo $selleremail;?>">

<input type="hidden" name="service_name" value="<?php echo $ser_name;?>">

<input type="hidden" name="booking_date" value="<?php echo $booking[0]->booking_date;?>">


<button type="submit" value="PROCEED TO CHECKOUT" class="booknow right">PROCEED TO CHECKOUT</button>


</div>
</div>
	</form>
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>
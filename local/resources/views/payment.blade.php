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
<?php $url = URL::to("/");?>
    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
    
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>PAYMENT CONFIRMATION</h1></div>
	 </div>
	
	<div class="container">
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	<?php //echo $sum;?>
	
	<?php //echo $admin_email;?>
	
	<?php //echo $user_email;?>
	
	
	<div class="container text-center">
	<div class="min-space"></div>
	<label>Services Name </label> - <?php echo $service_names; ?><br>
     <label>Booking Date</label> -  <?php echo $booking_date; ?><br>
    <label>Price</label> - <?php echo $prices; ?> <?php echo $currency; ?>
    <form action="<?php echo $paypal_url; ?>" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $service_names; ?>">
        <input type="hidden" name="item_number" value="<?php echo $booking_id;?>">
        <input type="hidden" name="amount" value="<?php echo $prices; ?>">
        <input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='<?php echo $url;?>/cancel'>
		<input type='hidden' name='return' value='<?php echo $url;?>/success/<?php echo $booking_id;?>'>
		<input type="submit" name="submit" value="Pay Now" class="paynow radiusoff">
     
    
    </form>
    
	</div>
	
	
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>
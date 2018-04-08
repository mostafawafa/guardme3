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
	<div class="container">
	 <h1>Shop</h1>
	 
	 
	
	 
	 
	 <div class="clearfix"></div>
	 
	 
	 
	 
	 
	 
	 
	 
	 <?php if($shopcount==0){?>
	 
	 
	 @if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	
 	@if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif
	
	<?php $url = URL::to("/"); ?>
	 <form class="form-horizontal" role="form" method="POST" action="{{ route('addshop') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
	 
	 
	 <input type="hidden" name="editid" value="">
	 
	 
    <div class="row profile shop">
		<div class="col-md-6">
		
		<div class="form-group">
                            <label for="name" class="col-md-12">Shop Name <span class="require">*</span></label>

                            <div class="col-md-12">
                     <input id="shop_name" type="text" class="form-control validate[required] text-input" name="shop_name" value="" autofocus>

                                
                            </div>
        </div>
		
		
		<input type="hidden" name="admin_email_id" value="<?php echo $admin_email_id[0]->email;?>">
		
		<div class="form-group">
                            <label for="name" class="col-md-12">City <span class="require">*</span></label>

                            <div class="col-md-12">
                                <input id="shop_city" type="text" class="form-control validate[required] text-input" name="shop_city" value="">

                                
                            </div>
        </div>
		
		
		<div class="form-group">
                            <label for="name" class="col-md-12">Country <span class="require">*</span></label>

                            <div class="col-md-12">
                                <input id="shop_country" type="text" class="form-control validate[required] text-input" name="shop_country" value="">

                                
                            </div>
        </div>
		
		
		
		<div class="form-group">
                            <label for="name" class="col-md-12">Shop Phone No <span class="require">*</span></label>

                            <div class="col-md-12">
                                <input id="shop_phone_no" type="text" class="form-control validate[required] text-input" name="shop_phone_no" value="">

                                
                            </div>
        </div>
		
		<div class="webheight"></div>
		
		
		
		<div class="form-group">
                            <label for="name" class="col-md-12">Shop Start Time <span class="require">*</span></label>

                            <div class="col-md-12">
                               
								<select id="shop_start_time" name="shop_start_time" class="form-control validate[required]">
								<option value="">None</option>
								<?php foreach($time as $timekey => $timevalue) {?>
								<option value="<?php echo $timevalue;?>"><?php echo $timekey;?></option>
								<?php } ?>

							</select>

                                
                     </div>
        </div>
		
		
		
		
		<div class="form-group">
                            <label for="name" class="col-md-12">Shop Cover Photo</label>
                            <div class="col-md-12 littlebit"><span class="require">[Please select an image 1400px / 300px]</span></div>
                            <div class="col-md-12">
                                 <input type="file" id="shop_cover_photo" name="shop_cover_photo" class="form-control">
                                
                                
                            </div>
							
							
							
        </div>
		
		
		
		
		
		<div class="form-group">
                            <label for="name" class="col-md-12">Advance Booking upto <span class="require">*</span></label>

                            <div class="col-md-12">
                               <select id="shop_booking_upto" name="shop_booking_upto" class="form-control validate[required] text-input">
								<option value="">None</option>
								<?php foreach($days as $daykey => $dayvalue) {?>
								<option value="<?php echo $dayvalue;?>"><?php echo $daykey;?></option>
								<?php } ?>

							</select>

                                
                            </div>
        </div>
		
		
		
		
		<div class="form-group">
                            <label for="name" class="col-md-12">Allowed Bookings Per Hour <span class="require">*</span></label>

                            <div class="col-md-12">
                                <input id="shop_booking_hour" type="number" class="form-control validate[required] text-input" name="shop_booking_hour" value="">

                                
                            </div>
        </div>
		
		
			
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<div class="col-md-6 moves20">
            
			   
			   
			   <div class="form-group">
                            <label for="name" class="col-md-12">Shop Address <span class="require">*</span></label>

                            <div class="col-md-12">
                                <input id="shop_address" type="text" class="form-control validate[required] text-input" name="shop_address" value="">

                                
                            </div>
              </div>
			   
                   
               <div class="form-group">
                            <label for="name" class="col-md-12">Pin Code <span class="require">*</span></label>

                            <div class="col-md-12">
                                <input id="shop_pin_code" type="text" class="form-control validate[required] text-input" name="shop_pin_code" value="">

                                
                            </div>
              </div>
			  
			  
			  <div class="form-group">
                            <label for="name" class="col-md-12">State <span class="require">*</span></label>

                            <div class="col-md-12">
                                <input id="shop_state" type="text" class="form-control validate[required] text-input" name="shop_state" value="">

                                
                            </div>
              </div>
			  
			  
			  
			  <div class="form-group">
                            <label for="name" class="col-md-12">Shop Description <span class="require">*</span></label>

                            <div class="col-md-12">
                                <textarea id="shop_desc" class="form-control validate[required] text-input" name="shop_desc"></textarea>

                                
                            </div>
              </div>
                        
				

                <div class="form-group">
                            <label for="name" class="col-md-12">Shop End Time <span class="require">*</span></label>

                            <div class="col-md-12">
                                
								<select id="shop_end_time" name="shop_end_time" class="form-control validate[required]">
								<option value="">None</option>
								<?php foreach($time as $timekey => $timevalue) {?>
								<option value="<?php echo $timevalue;?>" ><?php echo $timekey;?></option>
								<?php } ?>

							</select>

                                
                     </div>
               </div>				
						
						
						
						
						
						<div class="form-group">
                            <label for="name" class="col-md-12">Shop Profile Photo</label>
                               <div class="col-md-12 littlebit"><span class="require">[Please select an image 150px / 150px]</span></div>
                            <div class="col-md-12">
                                 <input type="file" id="shop_profile_photo" name="shop_profile_photo" class="form-control">

                                
                            </div>
							
							
							
							
							
							
                      </div>
						
                     
					  
					  
					  <div class="form-group">
                            <label for="name" class="col-md-12">Shop Working Days <span class="require">*</span></label>

                            <div class="col-md-12">
							<?php foreach($daytxt as $daytxtkey => $daytxtvalue){?>
							
                                 <input type="checkbox" id="shop_working_days" name="shop_working_days[]" class="validate[required]" value="<?php echo $daytxtvalue;?>"> <?php echo $daytxtkey;?><br/>
							<?php } ?>
                                
                            </div>
                      </div>
						
					  
					  
					  
                        <?php if(!empty($site_setting[0]->site_logo)){
							 
							?>
						
						<input type="hidden" name="site_logo" value="<?php echo $url.'/local/images/settings/'.$site_setting[0]->site_logo;?>">
					
						<?php } else { ?>
						
						<input type="hidden" name="site_logo" value="">
						
						<?php } ?>
						
						
						<input type="hidden" name="site_name" value="<?php echo $site_setting[0]->site_name;?>">
                     
                    
               
				
				
			   
			   
			   
			   
			   
           
		</div>
		
		
	
		
	</div>
	
    <div class="row">
	<div class="col-md-12">
		                       
							   <a href="<?php echo $url;?>/addshop" class="btn btn-primary">
                                   Reset
                                </a>
								
								<?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success radiusoff btndisable">Add</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
								
                                <button type="submit" class="btn btn-success radiusoff">
                                    Add
                                </button>
								
								<?php } ?>
                           
		</div>
	</div>
	
	

	 </form>
	 
	 
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
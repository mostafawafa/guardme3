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
	 <div class="col-md-12" align="center"><h1>Account</h1></div>
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
      <li class="active"><a href="#inbox" data-toggle="tab"><span class="lnr lnr-user blok"></span> Freelancer Profile</a></li>
      <li><a href="#sent" data-toggle="tab"><span class="lnr lnr-cog blok"></span> Employer Profile</a></li>
      <li><a href="#assignment" data-toggle="tab"><span class="lnr lnr-star blok"></span> Reviews</a></li>
      
    </ul>
    
    <div class="tab-content">
	
	
	<div class="tab-pane active" id="inbox">
       <div class="clearfix"></div>

       <div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="container">
	
    <div class="row profile">
		<div class="col-md-3 ">
			<div class="profile-sidebar">
				
				<div class="profile-userpic">
				<?php 
				$url = URL::to("/");
				$userphoto="/userphoto/";
						$path ='/local/images'.$userphoto.$editprofile[0]->photo;
						if($editprofile[0]->photo!=""){?>
					<img src="<?php echo $url.$path;?>" class="img-responsive" alt="">
						<?php } else { ?>
						<img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="img-responsive" alt="">
						<?php } ?>
				</div>
				
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $editprofile[0]->name;?> 
					</div>
					<?php $sta=$editprofile[0]->admin; if($sta==1){ $viewst="Admin"; } else if($sta==2) { $viewst="Seller"; } else if($sta==0) { $viewst="Customer"; } ?>
				</div>
				
				<div class="profile-userbuttons">
					<a href="<?php echo $url;?>/my_bookings" class="btn btn-success btn-sm">My Bookings</a>
					<?php /* ?><a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Sign Out</a><?php */?>
					
				</div>
				
				<div class="profile-usermenu">
					<ul class="nav">
						<!--<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>-->
						<li>
							<a href="<?php echo $url;?>/dashboard">
							<i class="fa fa-user" aria-hidden="true"></i>

							Account Settings </a>
						</li>
						<?php if($sta!=1){?>
						<li>
						<?php if(config('global.demosite')=="yes"){?>
						<a href="#" class="btndisable"> <i class="fa fa-trash-o" aria-hidden="true"></i>
							Delete Account <span class="disabletxt" style="font-size:13px;">( <?php echo config('global.demotxt');?> )</span>
							</a> 
						<?php } else { ?>
						
							<a href="<?php echo $url;?>/delete-account" onclick="return confirm('Are you sure you want to delete your account?');">
							
							<i class="fa fa-trash-o" aria-hidden="true"></i>
							Delete Account
							</a>
						<?php } ?>
						</li>
						<?php } ?>
						
						<li>
							<a href="{{ url('account') }}">
							<i class="fa fa-user" aria-hidden="true"></i>

							My Account </a>
						</li>

						<li>
							<a href="<?php echo $url;?>/logout">
							<i class="fa fa-sign-out" aria-hidden="true"></i>

							Log Out </a>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
		<div class="col-md-9 moves20">
            <div class="profile-content">
			   
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
			   
			   <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('dashboard') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control validate[required] text-input" name="name" value="<?php echo $editprofile[0]->name;?>" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control validate[required,custom[email]] text-input" name="email" value="<?php echo $editprofile[0]->email;?>">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control"  name="password" value="">

                                
                            </div>
                        </div>

                        
						
						<input type="hidden" name="savepassword" value="<?php echo $editprofile[0]->password;?>">
						
						 <input type="hidden" name="id" value="<?php echo $editprofile[0]->id; ?>">
						
						 <div class="form-group">
                            <label for="phoneno" class="col-md-4 control-label">Phone No</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control validate[required] text-input" value="<?php echo $editprofile[0]->phone;?>" name="phone">
                            </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
							<select name="gender" class="form-control validate[required] text-input">
							  
							  <option value=""></option>
							   <option value="male" <?php if($editprofile[0]->gender=='male'){?> selected="selected" <?php } ?>>Male</option>
							   <option value="female" <?php if($editprofile[0]->gender=='female'){?> selected="selected" <?php } ?>>Female</option>
							</select>
                               
                            </div>
                        </div>
						
						
						
						
						<div class="form-group">
                            <label for="phoneno" class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                <input type="file" id="photo" name="photo" class="form-control">
								@if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						<input type="hidden" name="currentphoto" value="<?php echo $editprofile[0]->photo;?>">
						
						
						<input type="hidden" name="usertype" value="<?php echo $editprofile[0]->admin;?>">
						

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
							<?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-primary btndisable">Update</button> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
							
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
							<?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
	 
	 
	<div class="height30"></div>
	<div class="row">
	
	
	</div>
	
	</div>
	</div>
      </div>
     
	 
	 
	 
	 
       
      <div class="tab-pane" id="sent">
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
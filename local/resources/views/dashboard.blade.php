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
	 <div class="col-md-12" align="center"><h1>Dashboard</h1></div>
	 </div>
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
					<div class="profile-usertitle-job">
						User Type : <?php echo $viewst;?>
					</div>
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
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>
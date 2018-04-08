<!DOCTYPE html>
<html lang="en">
<head>


<meta name="csrf-token" content="{{ csrf_token() }}">

   @include('style')



   <style type="text/css">
.noborder ul,li { margin:0; padding:0; list-style:none;}
.noborder .label { color:#000; font-size:16px;}
.update{

	margin-top:10px
}
.page-title{
	margin-bottom: 20px
}
</style>

	<script>
		   window.verificationConfig =  {
			  url  : "{{ url('/') }}"
		  }
	  </script>



</head>
<body>



    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->











	<div class="clearfix"></div>





	<div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>Freelancer Profile</h1></div>
	 </div>
	<div class="container" id='phone'>
		<div style="margin-top: 20px;"></div>
		@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	@if(! \Auth::user()->verified)
		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-warning">
					We have already sent email verification to your email. Please check and confirm via the given link. Have not received yet? <a href="{!! route('user.resend_verification') !!}" class="alert-link">Resend email verification</a>.
				</div>
			</div>
		</div>
	@endif


	@include('shared.message')

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
						<div style="margin-bottom:5px">
							@if(\Auth::user()->verified)
								<span class="text-success">Email Verified</span>
							@endif
						</div>

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
                                                <?php
                                                    $sellmail = Auth::user()->email;
                                                    $shcount = DB::table('shop')
                                                            ->where('seller_email', '=',$sellmail)
                                                            ->count();
                                                ?>
                                                <li><a href="<?php if(empty($shcount)){?><?php echo $url;?>/addcompany<?php } else { ?><?php echo $url;?>/account<?php } ?>"><i class="fa fa-gear" aria-hidden="true"></i>Dashboard</a></li>
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

						 <div>
							 <h4 class="text-center page-title">
								 <i class="fa fa-phone"></i>
				 
								 <template v-if="action === 'new'"> Phone verification</template>
								 <template v-if="action === 'unbind'"> Remove phone number</template>
								 <template v-if="action === 'confirm'"> SMS Confirmation</template>
							 </h4>
						 </div>
				 
										 <div class="form-group">
											 <label class="control-label col-md-4 ">
												 Phone Number <template v-if="action === 'confirm'">(<a href="#" @click.prevent="change">change</a>)</template>
											 </label>
											 <div class="col-md-6" >
												 <input class="form-control" type="text" v-model="phone"
														:disabled="action === 'unbind' || (action === 'confirm' && user.phone_verified)" />
											 </div>
										 </div>
				 
										 <div  class="form-group " id="confirmation-code">
										 <template v-if="action === 'confirm'">
											 <label  class="control-label col-md-4">Confirmation code</label>
											 <div class="col-md-6">
												 <input class="form-control" type="text" v-model="code" />
											 </div>
										 </template>
										 </div>
										 <div class="form-group">

									 <div class="col-md-6 col-md-offset-4">
									 <a href="#" @click.prevent="send" class="btn btn-primary text" >
										 <template v-if="action === 'confirm'">OK!</template>
										 <template v-else-if="action === 'unbind'">Remove Phone Number</template>
										 <template v-else-if="action === 'new'">Send confirmation code</template>
									 </a>
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

                                <button type="submit" class="btn btn-primary update">
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
	  <script src="{{ asset('js/vue_axios.js') }}"></script>
	<script src="{{ asset('js/phone.min.js') }}"></script>
</body>
</html>
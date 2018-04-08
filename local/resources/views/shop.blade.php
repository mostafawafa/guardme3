<!DOCTYPE html>
<html lang="en">
<head>

<meta name="csrf-token" content="{{ csrf_token() }}">

   @include('style')


   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

   <style type="text/css">
.noborder ul,li { margin:0; padding:0; list-style:none;}
.noborder .label { color:#000; font-size:16px;}
.update{

	margin-top:10px
}

</style>

	<script>
		   window.verificationConfig =  {
			  url  : "{{ url('/') }}"
		  }
	  </script>




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
	<!--<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>Account</h1></div>
	 </div>-->
	<div class="">










	 <?php if($shopcount==1){?>
	 <div class="profile shop">


		<!--<div class="fb-profile">
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
    </div>-->

		<div class="container">
	<div class="row">

        <div class="col-md-12">


				<div class="clearfix"></div>





    <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a href="#inbox" data-toggle="tab"><span class="lnr lnr-user blok"></span> Freelancer Profile</a></li>
      <li><a href="#sent" data-toggle="tab"><span class="lnr lnr-apartment blok"></span> Employer Profile</a></li>
      <li><a href="#assignment" data-toggle="tab"><span class="lnr lnr-star blok"></span> Reviews</a></li>

    </ul>

    <div class="tab-content">


	<div class="tab-pane active" id="inbox">
       <div class="clearfix"></div>

       <div class="clearfix"></div>





	<div class="video">
	<div class="clearfix"></div>
	<div class="container" >

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
							@if(Auth::user()->verified)
								<span class="text-success">
									<i class="fa fa-check-circle"></i> Email verified
								</span>
							@endif
						</div>
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
						<!--
						<li>
							<a href="{{ url('account') }}">
							<i class="fa fa-user" aria-hidden="true"></i>

							My Account </a>
						</li>
                                                -->
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
                    <div class="alert alert-warning" role="alert">
                        Please complete your profile below. You will only be eligible to apply for work after your profile is complete and your documents are approved.
                    </div>
                    <div id="progressbar"></div>
                    
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('dashboard') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}

                <fieldset>
                    <legend>Personal Details:</legend>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">                            
                            <label for="name" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="trackprogress form-control validate[required] text-input" name="name" value="<?php echo $editprofile[0]->name;?>" autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                <input id="firstname" type="text" class="trackprogress form-control validate[required] text-input" name="firstname" value="<?php echo $editprofile[0]->firstname;?>" autofocus>
                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="trackprogress form-control validate[required] text-input" name="lastname" value="<?php echo $editprofile[0]->lastname;?>" autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="trackprogress form-control validate[required,custom[email]] text-input" name="email" value="<?php echo $editprofile[0]->email;?>">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <style>
                            #address_id{
                                width: 60%;
                                float: left;
                            }
                        </style>
                        <div class="form-group{{ $errors->has('address_id') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <div id="postcode_lookup"></div>
                                <div>Please fetch your address detail using your postcode</div>
                                @if ($errors->has('address_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_id') }}</strong>
                                    </span>
                                @endif
                                <!-- Add to your existing form -->
                                @if(count($address) >0))
                                <input id="line1" name="line1" class="trackprogress form-control text-input validate[required]" type="text" placeholder="Address line1" value="{{$address[0]->line1}}">
                                <input id="line2" name="line2" class="trackprogress form-control text-input" type="text" placeholder="Address line2" value="{{$address[0]->line2}}">
                                <input id="line3" name="line3" class="trackprogress form-control text-input" type="text" placeholder="Address line3" value="{{$address[0]->line3}}">  
                                <input id="town" name="town" class="trackprogress form-control text-input validate[required]" type="text" placeholder="Town" value="{{$address[0]->citytown}}">             
                                <input id="country" name="country" class="trackprogress form-control text-input  validate[required]" type="text" placeholder="Country" value="{{$address[0]->country}}">
                                <input id="postcode" name="postcode" class="trackprogress form-control text-input  validate[required]" type="text" placeholder="Postalcode" value="{{$address[0]->postcode}}">
                                @endif
                            </div>
                        </div>                    
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="trackprogress form-control"  name="password" value="">
                            </div>
                        </div>		
                        <div class="form-group">
                            <label for="phoneno" class="col-md-4 control-label">Phone Number</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="trackprogress form-control validate[required] text-input" value="<?php echo $editprofile[0]->phone;?>" name="phone">
                            </div>
                        </div>
                                <div id='phoneVue'>
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
				 
										 <div v-if="action === 'confirm'"  class="form-group" id="confirmation-code">
										 <template v-if="action === 'confirm'">
											 <label  class="control-label col-md-4">Confirmation code</label>
											 <div class="col-md-6">
												 <input class="form-control" type="text" v-model="code" />
											 </div>
										 </template>
										 </div>
										 <div class="form-group">

									 <div class=" col-md-6 col-md-offset-4">
									 <a href="#" @click.prevent="send" class="btn btn-primary text" >
										 <template v-if="action === 'confirm'">OK!</template>
										 <template v-else-if="action === 'unbind'">Remove Phone Number</template>
										 <template v-else-if="action === 'new'">Send confirmation code</template>
									 </a>
									 </div>
										 </div>
                                         </div>
                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                                <select name="gender" class="trackprogress form-control validate[required] text-input">							  
                                        <option value=""></option>
                                        <option value="male" <?php if($editprofile[0]->gender=='male'){?> selected="selected" <?php } ?>>Male</option>
                                        <option value="female" <?php if($editprofile[0]->gender=='female'){?> selected="selected" <?php } ?>>Female</option>
                                </select>
                            </div>
                        </div>	
                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">DOB</label>
                            <div class="col-md-6">
                                <?php                            
                                    echo Form::input('date', 'dob', old('dob', $editprofile[0]->dob), ['class' => 'trackprogress validate[required] form-control', 'placeholder' => 'dob']);
                                ?>
                                @if ($errors->has('dob'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="photo" class="col-md-4 control-label">Avatar</label>
                            <div class="col-md-6">
                                <input type="file" id="photo" name="photo" class="trackprogress form-control {{empty($editprofile[0]->photo)?'validate[required]':''}}" value="{{old('photo', $editprofile[0]->photo)}}">
                                @if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                </fieldset>
                <fieldset>
                    <legend>Nationality and Work Details</legend>
                        <div class="form-group">
                            <label for="nationality" class="col-md-4 control-label">Nationality</label>
                            <div class="col-md-6">
                                    <select name="nationality" id="nationality" class="trackprogress form-control text-input">
                                        <option value=""></option>
                                        @if($countries->count())
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" <?php if($country->id==$editprofile[0]->nation_id){?> selected="selected" <?php } ?>>{{$country->name}}</option>                                                    
                                            @endforeach
                                        @endif
                                    </select>                               
                            </div>
                        </div>
                        <div id="visa_no_field" class="form-group{{ $errors->has('visa_no') ? ' has-error' : '' }}">
                            <label for="visa_no" class="col-md-4 control-label">Visa Number</label>
                            <div class="col-md-6">
                                <input id="visa_no" type="text" class="trackprogress form-control text-input" name="visa_no" value="<?php echo $editprofile[0]->visa_no;?>">
                                @if ($errors->has('visa_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visa_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div id="niutr_no_field" class="form-group{{ $errors->has('niutr_no') ? ' has-error' : '' }}">
                            <label for="niutr_no" class="col-md-4 control-label">NI or UTR Number</label>
                            <div class="col-md-6">
                                <input id="niutr_no" type="text" class="form-control text-input" name="niutr_no" value="<?php echo $editprofile[0]->niutr_no;?>">
                                @if ($errors->has('niutr_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('niutr_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('work_category') ? ' has-error' : '' }}">
                            <label for="work_category" class="col-md-4 control-label">Work Category</label>
                            <div class="col-md-6">
                                @if ($editprofile[0]->work_category == 1)
                                    {{ Form::radio('category', 1, true) }} Door Supervisor<br>
                                @else
                                    {{ Form::radio('category', 1) }} Door Supervisor<br>
                                @endif
                                @if ($editprofile[0]->work_category == 2)
                                    {{ Form::radio('category', 2, true) }} Security Guard<br>
                                @else
                                    {{ Form::radio('category', 2) }} Security Guard<br>
                                @endif
                                @if ($editprofile[0]->work_category == 3)
                                    {{ Form::radio('category', 3, true) }} Close Protection
                                @else
                                    {{ Form::radio('category', 3) }} Close Protection
                                @endif                                
                            </div>
                        </div>                    
                        <div class="form-group{{ $errors->has('sia_license') ? ' has-error' : '' }}">
                            <label for="sia_licence" class="col-md-4 control-label">SIA Number</label>
                            <div class="col-md-6">
                                <input id="sia_licence" type="text" class="trackprogress form-control text-input" name="sia_licence" value="<?php echo old('sia_licence',$editprofile[0]->sia_licence);?>">

                                @if ($errors->has('sia_licence'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sia_licence') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('sia_expirydate') ? ' has-error' : '' }}">
                            <label for="sia_expirydate" class="col-md-4 control-label">SIA Expiry</label>
                            <div class="col-md-6">
                            <?php
                                echo Form::input('date', 'sia_expirydate', old('siaexpiry',$editprofile[0]->sia_expirydate), ['class' => 'trackprogress form-control', 'placeholder' => 'Expiry Date']);
                            ?>
                            </div>
                        </div>
                </fieldset>
                <fieldset>
                    <legend>Verification Documents</legend>
                        <div class="form-group">
                            <label for="passphoto" class="col-md-4 control-label">Passport photograph</label>
                            <div class="col-md-6">
                                <input type="file" id="passphoto" name="passphoto" class="trackprogress form-control">
                                @if ($errors->has('passphoto'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('passphoto') }}</strong>
                                    </span>
                                @endif
                                @if (!empty($editprofile[0]->passphoto))
                                    <span class="info-block" style="color:green;">
                                        <strong>Document already uploaded</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label for="pass_page" class="col-md-4 control-label">Passport information page</label>
                            <div class="col-md-6">
                                <input type="file" id="pass_page" name="pass_page" class="trackprogress form-control">
                                @if ($errors->has('pass_page'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('pass_page') }}</strong>
                                    </span>
                                @endif
                                @if (!empty($editprofile[0]->pass_page))
                                    <span class="info-block" style="color:green;">
                                        <strong>Document already uploaded</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="visa_page" class="col-md-4 control-label">Visa page or Residency stamp</label>
                            <div class="col-md-6">
                                <input type="file" id="visa_page" name="visa_page" class="trackprogress form-control">
                                @if ($errors->has('visa_page'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('visa_page') }}</strong>
                                    </span>
                                @endif
                                @if (!empty($editprofile[0]->visa_page))
                                    <span class="info-block" style="color:green;">
                                        <strong>Document already uploaded</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sia_doc" class="col-md-4 control-label">SIA License</label>
                            <div class="col-md-6">
                                <input type="file" id="sia_doc" name="sia_doc" class="trackprogress form-control">
                                @if ($errors->has('sia_doc'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('sia_doc') }}</strong>
                                    </span>
                                @endif
                                @if (!empty($editprofile[0]->sia_doc))
                                    <span class="info-block" style="color:green;">
                                        <strong>Document already uploaded</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address_proof" class="col-md-4 control-label">Proof of Address</label>
                            <div class="col-md-6">
                                <input type="file" id="address_proof" name="address_proof" class="trackprogress form-control">
                                @if ($errors->has('address_proof'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('address_proof') }}</strong>
                                    </span>
                                @endif
                                 @if (!empty($editprofile[0]->address_proof))
                                    <span class="info-block" style="color:green;">
                                        <strong>Document already uploaded</strong>
                                    </span>
                                @endif                                
                           </div>
                        </div>						
                    </fieldset>
                    <div class="form-group">
                        <div class="alert alert-info" role="alert">
                            After uploading, please take your Passport and SIA licence to the nearest post office for verification. This process will cost you £8.50.<br>
                            Once certified, send a copy of the document to your our Licenced Partner. Visit the verification page for more information.
                        </div>
                    </div>
                        <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="agree" class="trackprogress validate[required]" value="agree" /> I Agree to the GuardME terms and conditions
                                    </label>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <?php if(config('global.demosite')=="yes"){?>
                                    <button type="button" class="btn btn-primary btndisable">Update</button> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                        <input type="hidden" name="currentphoto" value="<?php echo $editprofile[0]->photo;?>">
                        <input type="hidden" name="currentpassphoto" value="<?php echo $editprofile[0]->passphoto;?>">
                        <input type="hidden" name="currentaddressproof" value="<?php echo $editprofile[0]->address_proof;?>">
                        <input type="hidden" name="currentsiadoc" value="<?php echo $editprofile[0]->sia_doc;?>">
                        <input type="hidden" name="currentvisapage" value="<?php echo $editprofile[0]->visa_page;?>">
                        <input type="hidden" name="currentpasspage" value="<?php echo $editprofile[0]->pass_page;?>">
                        <input type="hidden" name="usertype" value="<?php echo $editprofile[0]->admin;?>">                
                        <input type="hidden" name="savepassword" value="<?php echo $editprofile[0]->password;?>">						
                        <input type="hidden" name="id" value="<?php echo $editprofile[0]->id; ?>">
                        @if(count($address) >0))

                        <input type="hidden" id="addresslat" name="addresslat" value="{{$address[0]->latitude}}">  
                        <input type="hidden" id="addresslong" name="addresslong" value="{{$address[0]->longitude}}">
                    @endif
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
        <!--
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
        -->



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
        <script src="{{ asset('js/vue_axios.js') }}"></script>
	<script src="{{ asset('js/phone.min.js') }}"></script>
</body>
</html>
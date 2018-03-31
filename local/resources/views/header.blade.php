<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		
?>		
<div class="navbar navbar-fixed-top <?php if($currentPaths=="index" or $currentPaths=="/"){?>homenav<?php } else {?>migrateshop_othernav<?php } ?> navbar-inverse" role="navigation">
      <div class="container topbottom">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#b-menu-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  
          <a class="" href="<?php echo $url;?>">
		   <?php if(!empty($setts[0]->site_logo)){?>
		  
		  <img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" border="0" alt="<?php echo $setts[0]->site_name;?>" />
		   <?php } else {?>
		   <?php echo $setts[0]->site_name;?>
		   <?php } ?>
		  </a>
        </div>
        <div class="collapse navbar-collapse" id="b-menu-1">
          <ul class="nav navbar-nav navbar-right <?php if($currentPaths=="index" or $currentPaths=="/"){?>sangvish_homepage<?php } else {?>sangvish_otherpage<?php } ?>">
		  <!--<li class="active"><a href="#">Join as a pro</a></li>-->
            <?php if (Auth::guest()) {?>
			
            <li><a href="<?php echo $url;?>/register">Sign Up</a></li>
            <li><a href="<?php echo $url;?>/login">Login</a></li>
            <?php } else { ?>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                 <?php if(Auth::check()) { ?>
                <?php if(Auth::user()->admin==1) {?>
				<li><a href="{{ url('admin/') }}" target="_blank">Admin Dashboard</a></li>
				<?php } ?>
								
				<?php if(Auth::user()->admin==0) {?>
				<li><a href="<?php echo $url;?>/dashboard">My Profile</a></li>
				<li><a href="<?php echo $url;?>/my_bookings">My Bookings</a></li>
				
				<?php } ?>			
								
								
			    <?php if(Auth::user()->admin==2) {
					
					$sellmail = Auth::user()->email;
    	 $shcount = DB::table('shop')
		 ->where('seller_email', '=',$sellmail)
		 ->count();
					?>
				<li><a href="<?php echo $url;?>/dashboard">My Profile</a></li>
				<li><a href="<?php echo $url;?>/my_bookings">My Bookings</a></li>
				<li><a href="<?php echo $url;?>/myorder">My Order</a></li>
				<li><a href="<?php if(empty($shcount)){?><?php echo $url;?>/addshop<?php } else { ?><?php echo $url;?>/shop<?php } ?>">My Shop</a></li>
				<li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/services" <?php if(empty($shcount)){?>class="disabled"<?php } ?>>My Services</a></li>
				<li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/gallery" <?php if(empty($shcount)){?>class="disabled"<?php } ?>>Shop Gallery</a></li>
				<li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/wallet" <?php if(empty($shcount)){?>class="disabled"<?php } ?>>Wallet</a></li>
				
				<?php } ?>			
								
								
								
								
								
								
								
								<?php } ?>										
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a></li>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
              </ul>
            </li>
			<?php } ?>
          </ul>
        </div> <!-- /.nav-collapse -->
      </div> <!-- /.container -->
    </div> <!-- /.navbar -->
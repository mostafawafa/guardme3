<?php 
use Illuminate\Support\Facades\Route;
$ncurrentPath= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
?>
<footer>
	  <div class="footerbar">
	   <div class="clearfix"></div>
	   <div class="col-md-12">
	    <div class="col-md-1"></div>
		<div class="col-md-10">
		
		<div class="col-md-4">
		<div>
		
		
		 <a class="" href="<?php echo $url;?>">
		   <?php if(!empty($setts[0]->site_logo)){?>
		  
		  <img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" border="0" alt="<?php echo $setts[0]->site_name;?>" class="img-responsive footres"/>
		   <?php } else {?>
		   <?php echo $setts[0]->site_name;?>
		   <?php } ?>
		  </a>
		</div>
		
		<div class="social">
		<ul>
		<li><a href="<?php echo $setts[0]->site_facebook;?>" target="_blank"><img src="<?php echo $url."/local/images/facebook.png";?>" border="0" alt="facebook" title="facebook"></a></li>
		<li><a href="<?php echo $setts[0]->site_twitter;?>" target="_blank"><img src="<?php echo $url."/local/images/twitter.png";?>" alt="twitter" border="0" title="twitter"></a></li>
		<li><a href="<?php echo $setts[0]->site_gplus;?>" target="_blank"><img src="<?php echo $url."/local/images/gplus.png";?>" alt="gplus" border="0" title="gplus"></a></li>
		<li><a href="<?php echo $setts[0]->site_pinterest;?>" target="_blank"><img src="<?php echo $url."/local/images/instagram.png";?>" alt="instagram" border="0" title="instagram"></a></li>
		<li><a href="<?php echo $setts[0]->site_instagram;?>" target="_blank"><img src="<?php echo $url."/local/images/pinterest.png";?>" alt="pinterest" border="0" title="pinterest"></a></li>
		</ul>
		
		</div>
		
		</div>
		
		<div class="col-md-2">
		<h4>Pages</h4>
		<ul>
		<li><a href="<?php echo $url;?>">Home</a></li>
		<li><a href="<?php echo $url;?>/about">About </a></li>
		<li><a href="<?php echo $url;?>/terms-conditions">Terms and Conditions </a></li>
		<li><a href="<?php echo $url;?>/privacy-policy">Privacy Policy </a></li>
		<li><a href="<?php echo $url;?>/contact">Contact </a></li>
		</ul>
		
		</div>
		
		<div class="col-md-2">
		<h4>Customers </h4>
		<ul>
		<li><a href="<?php echo $url;?>/how-it-works">How it works </a></li>
		<li><a href="<?php echo $url;?>/safety">Safety </a></li>
		<li><a href="<?php echo $url;?>/service-guide">Service Guide </a></li>
		<li><a href="<?php echo $url;?>/how-to-pages">How To Pages </a></li>
		</ul>
		</div>
		
		<div class="col-md-2">
		<h4>Pros </h4>
		<ul>
		
		<li><a href="<?php echo $url;?>/register">Signup </a></li>
		<li><a href="<?php echo $url;?>/login">Login </a></li>
		<li><a href="<?php echo $url;?>/success-stories">Success stories </a></li>
		</ul>
		</div>
		
		<div class="col-md-2">
		<h4>Questions? </h4>
		<ul>
		<li><a href="<?php echo $url;?>/contact">Contact </a></li>
		<li><a href="#">Android </a></li>
		<li><a href="#">Iphone </a></li>

		</ul>
		</div>
		
		</div>
		<div class="col-md-1"></div>
	  </div>
	  
	  </div>
	  
	  
	  <div class="clearfix"></div>
	  
	  <div class="footerbottom">
	  <div class="col-md-12">
	 
	  <div class="col-md-12">
	  <div class="col-md-12 paddingoff" align="center">
	  <p><?php if($setts[0]->site_copyright!=""){?><?php echo $setts[0]->site_copyright; } else {?>&copy; <?php echo date('Y');?>. All Rights Reserved. Designed by Migrateshop<?php } ?></p>
	  </div>
	  
	  <!--<div class="col-md-6 paddingoff">
	  <ul>
	  <li><a href="#">Privacy Policy</a></li>
	  <li><a href="#">Terms of use</a></li>
	  </ul>
	  </div>-->
	  
	  
	  </div>
	  
	  
	  
	  
	  </div>
	  </div>
        
      </footer>

   
    <!-- add javascripts -->
    
	<?php if($ncurrentPath=="index" or $ncurrentPath=="/"){?>
<script>
    $(document).ready(function(){
      $(window).scroll(function() {
      if($(window).width() > 1200 )
	   {
	  // check if scroll event happened
        if ($(document).scrollTop() > 50) { // check if user scrolled more than 50 from top of the browser window
          $(".navbar-fixed-top").css("background-color", "#F4F4F4");
		   
          $(".navbar-fixed-top li a").css("color","#000000");
		  
		  
		  $(".navbar-fixed-top li.dropdown .open a").css("color","#000000");
		  // if yes, then change the color of class "navbar-fixed-top" to white (#f8f8f8)
        } else {
          $(".navbar-fixed-top").css("background-color", "transparent"); 
		  
		   $(".navbar-fixed-top li a").css("color","#ffffff");
		   $(".navbar-fixed-top li.dropdown .open a").css("color","#000000");
		  // if not, change it back to transparent
        }
		
		
		
		}
		
      });
    });
</script>
	<?php } else  {?>
	<script>
    $(document).ready(function(){
      $(window).scroll(function() {
       if($(window).width() > 1200 )
	   {
	  // check if scroll event happened
        if ($(document).scrollTop() > 50) { // check if user scrolled more than 50 from top of the browser window
          $(".navbar-fixed-top").css("background-color", "#F4F4F4");
          $(".navbar-fixed-top li a").css("color","#000000");
		  // if yes, then change the color of class "navbar-fixed-top" to white (#f8f8f8)
        } else {
          $(".navbar-fixed-top").css("background-color", "#ffffff"); 
		   $(".navbar-fixed-top li a").css("color","#000000");
		  // if not, change it back to transparent
        }
		}
		
      });
    });
</script>
	<?php } ?>
    <!-- Only used for Script Tutorial's Demo site. Please ignore and remove. -->
  <script type="text/javascript">
	$(document).ready(function() {
  $('#media').carousel({
    pause: true,
    interval: false,
  });
});




</script>
	
	
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://getaddress.io/js/jquery.getAddress-2.0.7.min.js"></script>
	
	
	<script src="<?php echo $url;?>/js/jquery.multiselect.js"></script>
<script>
$('#langOpt').multiselect({
    columns: 1,
    placeholder: 'Select Services'
});
var pgsVal = 0;
$( ".trackprogress" ).each(function(i, obj) {
    if($(this).val().length >0){
        pgsVal += 4;
    }
});
console.log(pgsVal);
$( "#progressbar" ).progressbar({
    value: pgsVal,
    create: function(event, ui) {$(this).find('.ui-widget-header').css({'background-color':'#5cb85c'})}
});
$('.trackprogress').change(function() {
    var pbVal = 0;
    $( ".trackprogress" ).each(function(i, obj) {
        if($(this).val().length >0){
            pbVal += 4;
        }
    });
    $( "#progressbar" ).progressbar( "option", "value", pbVal );
    return false; 
});
$('#postcode_lookup').getAddress({
    api_key: 'ZTIFqMuvyUy017Bek8SvsA12209',
    input_id : 'address_id',
    input_name : 'address_id',
    input_class :'form-control validate[required]',
    button_class : 'btn btn-primary',
    dropdown_class:'form-control',
    <!--  Or use your own endpoint - api_endpoint:https://your-web-site.com/getAddress, -->
    output_fields:{
        line_1: '#line1',
        line_2: '#line2',
        line_3: '#line3',
        post_town: '#town',
        county: '#county',
        postcode: '#postcode'
    },
<!--  Optionally register callbacks at specific stages -->                                                                                                               
    onLookupSuccess: function(data){/* Your custom code */
        console.log(data);
        $('#addresslat').val(data.latitude);
        $('#addresslong').val(data.longitude);
        $('#country').val('UK');
    },
    onLookupError: function(){/* Your custom code */},
    onAddressSelected: function(elem,index){/* Your custom code */}
});
$("select#nationality").change(function(){    
    $( "select#nationality option:selected").each(function(){        
        if($(this).attr("value")=="229"){
            $("#visa_no_field").hide();
            $("#niutr_no_field").show();
        } else {
            $("#visa_no_field").show();
            $("#niutr_no_field").hide();
        }
    });
}).change();
</script>

	
	<?php /* ?><script src="{{ asset('js/app.js') }}"></script><?php */?>
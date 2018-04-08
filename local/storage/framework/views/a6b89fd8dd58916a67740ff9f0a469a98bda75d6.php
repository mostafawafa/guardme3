<?php
/*
Theme Name: thumbstack
Theme URI: http://migrateshop.com
Author: Migrate Shop Team
Author URI: http://sangvish.com
Description: Multi vendor marketplace
Version: 1.0
Text Domain: sangvish-tn
*/
?>
 <?php 
 use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();
 $url = URL::to("/"); 
 $setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$name = Route::currentRouteName();
 if($currentPaths=="/")
 {
	 $pagetitle="Home";
 }
 else 
 {
	 $pagetitle=$currentPaths;
 }
 ?>
 
 <title><?php echo $setts[0]->site_name;?> - <?php echo $pagetitle;?></title>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	 <!-- css stylesheets -->
	 <?php if(!empty($setts[0]->site_favicon)){?>
	 <link rel="icon" type="image/x-icon" href="<?php echo $url.'/local/images/settings/'.$setts[0]->site_favicon;?>" />
	 <?php } else { ?>
	 <link rel="icon" type="image/x-icon" href="<?php echo $url.'/local/images/noimage.jpg';?>" />
	 <?php } ?>
	 
    <link href="<?php echo $url;?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url;?>/css/style.css" rel="stylesheet" type="text/css">
	
	<link href="<?php echo $url;?>/css/flexslider.css" rel="stylesheet" type="text/css" />
	
	<link href="<?php echo $url;?>/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo $url;?>/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo $url;?>/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo $url;?>/css/validationEngine.jquery.css" type="text/css"/>
	
	<script src="<?php echo $url;?>/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $url;?>/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
		jQuery(document).ready(function(){
			jQuery("#formID").validationEngine({showOneMessage:true,promptPosition : "topLeft", scroll: false});
		});

		jQuery(document).ready(function(){
			jQuery("#formID2").validationEngine({showOneMessage:true,promptPosition : "topLeft", scroll: false});
		});
	</script>
	
	<link href="<?php echo $url;?>/css/autocomplete.css" rel="stylesheet" type="text/css">

	<script src="<?php echo $url;?>/js/jquery-1.10.4.min.js"></script>
	
	<link href="<?php echo $url;?>/css/jquery.multiselect.css" rel="stylesheet" type="text/css">
	
	<link href="<?php echo $url;?>/css/lightbox.min.css" rel="stylesheet" type="text/css">
	
	
	<link href="<?php echo $url;?>/css/jquery-ui.css" rel="stylesheet" type="text/css">
	
	
	
	
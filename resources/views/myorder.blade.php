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
<?php $url = URL::to("/"); ?>
    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
    
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>My Orders</h1></div>
	 </div>
	<div class="container">
	
	 <div class="height30"></div>
	 <div class="row">
	
	
	<?php 
	
	if($count==0){?>
	 <div class="err-msg" align="center">No order found!</div>
	<?php }  else { ?>
	<div class="col-md-12 service_style">
	 <div class="table-responsive">
	 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Sno</th>
					<th>Shop Name</th>
					 <th>Services Name</th>
					 <th>Booking date</th>
					 <th>Booking time</th>
					 <th>User Name</th>
					 <th>User Email</th>
					 <th>User Phone No</th>
					 <th>Total Amount</th>
					 <th>Status</th>
					 <?php /* ?><th>Action</th><?php */?>
					 
                </tr>
            </thead>
			<tbody>	

	       <?php 
					  $sno=0;
					  foreach ($booking as $viewbook) {
						  $sno++;
					$booking_time=$viewbook->booking_time;
							if($booking_time>12)
							{
								$final_time=$booking_time-12;
								$final_time=$final_time."PM";
							}
							else
							{
								$final_time=$booking_time."AM";
							}


					$ser_id=$viewbook->services_id;
			$sel=explode("," , $ser_id);
			$lev=count($sel);
			$ser_name="";
			$sum="";
			$price="";		
		for($i=0;$i<$lev;$i++)
			{
				$id=$sel[$i];	
                
				
				
				$fet1 = DB::table('subservices')
								 ->where('subid', '=', $id)
								 ->get();
				$ser_name.=$fet1[0]->subname.'<br>';
				$ser_name.=",";				 
				
				
				
				$ser_name=trim($ser_name,",");
				
			}		
			
			$bookid= $viewbook->book_id;
			$newbook = DB::table('booking')
								 ->where('book_id', '=', $bookid)
								 ->get();
								 
				$userdetail = DB::table('users')
                ->where('id', '=', $newbook[0]->user_id)
                ->get();				

					  ?>
    		
			<tr>
				<td><?php echo $sno; ?></td>
				<td><?php echo $viewbook->shop_name;?></td>
				<td><?php echo $ser_name;?></td>
				<td><?php echo $viewbook->booking_date;?></td>
				<td><?php echo $final_time;?></td>
				<td><?php echo $userdetail[0]->name;?></td>
				<td><?php echo $viewbook->user_email;?></td>
				<td><?php echo $userdetail[0]->phone;?></td>
				<td><?php echo $viewbook->total_amt.' '.$setting[0]->site_currency;?></td>
				<?php if($newbook[0]->status=="pending"){ $color="#FB6704"; } else if($newbook[0]->status=="paid")  { $color="#0DE50D"; }?> 
			    <td style="color:<?php echo $color;?>;"><?php echo $newbook[0]->status;?></td>
				
				
				 <?php /* ?><td>
				 <?php if(config('global.demosite')=="yes"){?>
				 <a href="#" class="btndisable"><img src="<?php echo $url.'/local/images/delete.png';?>" alt="Delete" border="0"></a><span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				 <?php } else {?>
				 
				 
				 <a href="<?php echo $url;?>/myorder/<?php echo $viewbook->book_id;?>" onclick="return confirm('Are you sure you want to delete this?')">
				 <img src="<?php echo $url.'/local/images/delete.png';?>" alt="Delete" border="0"></a>
				 <?php } ?>
				 </td><?php */?>

			</tr>
			 <?php } ?>
			</tbody>
															
            </table>
			</div>
	</div>
	<?php } ?> 
	
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>
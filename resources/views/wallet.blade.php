<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	

<script type="text/javascript">

function withdraw_check(str)
{	
	if(str=="paypal")
	{	
		document.getElementById("bank_info").style.display="none";
		document.getElementById("paypal").style.display="block";
	}
	else if(str=="bank")
	{
		document.getElementById("paypal").style.display="none";
		document.getElementById("bank_info").style.display="block";
	}
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
	 <div class="col-md-12" align="center"><h1>Wallet</h1></div>
	 </div>
	
	<div class="container">
	
	 
	 
	 
	 <div class="height30"></div>
	 
	 <?php if($shop_count!=0){?>
	 
	 
	 
	 
	 <?php if(!empty($check_count)){?>
		 
	 <div class="row">
	
	
	
	
	
	<form class="form-large" action="{{ route('wallet') }}" accept-charset="UTF-8" id="formID" method="post">
{{ csrf_field() }}
<div class="container">

	<div class="text-center withdraw_amt">		
		<span class="lnr lnr-tag"></span> <label>&nbsp;Minimum Withdraw Amt </label><span>&nbsp;<?php echo $setting[0]->withdraw_amt;?> <?php echo $setting[0]->site_currency;?>	</span>			
	</div>
     <br/>
	<div class="col-md-12">
	<input type="hidden" id="shop_id" name="shop_id" value="<?php echo $shop_id; ?>">
	<input type="hidden" name="min_with_amt" value="<?php echo $setting[0]->withdraw_amt;?>">
				
		<div class="col-lg-2 col-md-2 col-sm-2">
			<div class="form-group">
				<label>Shop Balance</label> [ <?php echo $setting[0]->site_currency;?> ]
				<?php 
				
								
				
				?>
				<?php if($with_count!=0) {
					$amt = $shop_balance;
				
				}
				if($with_count==0)
				{
					$amt = $bal;
				}
				?>
				<input type="text" class="form-control" id="shop_balance" name="shop_balance" readonly value="<?php echo $amt; ?>">
				
			</div>
		</div>
		
		<div class="col-lg-2 col-md-2 col-sm-2">
			<div class="form-group">
				<label>Withdraw Amount</label>
				<input type="text" class="form-control validate[required] text-input" id="withdraw_amt" name="withdraw_amt">	
			</div>
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-4">
			<div class="form-group">
				<label>Withdraw Option</label>
					<select id="withdraw_mode" name="withdraw_mode" class="form-control validate[required]" onchange="javascript:withdraw_check(this.value);">
						<?php 
						
						foreach($setting as $row)
						{
							$catid=$row->withdraw_option;
							$sel= explode(",",$catid); 
							$lev= count($sel);
							for($i=0;$i<$lev;$i++)
							{
								 $ad_cat= $sel[$i];
							
						?>
						<option value="<?php echo $ad_cat; ?>" ><?php echo $ad_cat; ?></option>
						<?php 
						} }
						?> 
					</select>
					
			</div>
		</div>
		<?php if($setting[0]->withdraw_option=="paypal" or $setting[0]->withdraw_option=="paypal,bank"){?>
		<div class="col-lg-4 col-md-4 col-sm-4" id="paypal" >
			<div class="form-group">
				<label>Enter Paypal ID</label>
				
					<input type="text" class="form-control validate[required] text-input" id="paypal_id" name="paypal_id">	
					
			</div>
		</div>
		<?php } ?>
		<?php if($setting[0]->withdraw_option=="bank" or $setting[0]->withdraw_option=="paypal,bank"){?>
		<div class="col-lg-4 col-md-4 col-sm-4" id="bank_info" <?php if($setting[0]->withdraw_option=="bank"){ } else {?>style="display:none;"<?php } ?>>
			<div class="form-group">
				<label>Bank Account No</label>
					<input type="text" class="form-control validate[required] text-input" id="bank_acc_no" name="bank_acc_no">
					<br/>				
					
					<label>Bank Name and Address</label>
					<input type="text" class="form-control validate[required] text-input" id="bank_name" name="bank_name">
									<br/>
					
					<label>IFSC Code</label>
					<input type="text" class="form-control validate[required] text-input" id="ifsc_code" name="ifsc_code">	
										

			</div>
		</div>
		<?php } ?>

	</div>
	<div class="row clearfix" style="">
	<div class="" align="center">
	<?php if(config('global.demosite')=="yes"){?><button type="button" class="form-control services-btn radiusoff btndisable">Save</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
	
	
			<input type="submit" class="form-control services-btn radiusoff" name="save" value="Save">
								<?php } ?>
	</div>
	</div>


</div>
</form>
	
	

	
	</div>
	
	 <?php } ?>
	
	
	
	<?php if(!empty($with_count)) {?>
	<div class="clearfix"></div>
	
	<div class="container">
			<div id="page-inner"> 
                  <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Pending Withdrawal
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SNo</th>
											<th>Withdraw Amount</th>
											<th>Withdraw Mode</th>
											<th>Paypal Id</th>
											<th>Bank Account No</th>
											<th>Bank Info</th>
											<th>IFSC Code</th>
											<th>Status</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php
										$sno=0;
										
										foreach($withdraws as $row)
										{
											$sno++;
											
											
											
									?>  									
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $row->withdraw_amt;?>&nbsp;<?php echo $setting[0]->site_currency; ?></td>
											<td><?php echo $row->withdraw_mode;?></td>	
											<td><?php echo $row->paypal_id;?></td>	
											<td><?php echo $row->bank_acc_no;?></td>		
											<td><?php echo $row->bank_info;?></td>
											<td><?php echo $row->ifsc_code;?></td>	
											<td><?php echo $row->withdraw_status;?></td>											
											
										</tr>
										<?php } ?>		
									</tbody>
															
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            </div>
		</div>
		
		
		
		
		
		<div class="clearfix"></div>
		
		
		
		
		
		<div class="container">
			<div id="page-inner"> 
                  <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Completed Withdrawal
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
										    <th>SNo</th>
                                            <th>Withdraw Amount</th>
											<th>Withdraw Mode</th>
											<th>Paypal Id</th>
											
											<th>Bank Account No</th>
											<th>Bank Info</th>
											<th>IFSC Code</th>
											<th>Status</th>
                                        </tr>
                                    </thead>
									<tbody>
											<?php
										$sno=0;
										
										foreach($withdraws_cc as $row)
										{
											$sno++;
											
											
											
									?>  									
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $row->withdraw_amt;?>&nbsp;<?php echo $setting[0]->site_currency; ?></td>
											<td><?php echo $row->withdraw_mode;?></td>	
											<td><?php echo $row->paypal_id;?></td>	
											<td><?php echo $row->bank_acc_no;?></td>		
											<td><?php echo $row->bank_info;?></td>
											<td><?php echo $row->ifsc_code;?></td>	
											<td><?php echo $row->withdraw_status;?></td>											
											
										</tr>
										<?php } ?>		
									</tbody>
															
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            </div>
		</div>
		
		
		
		
		
		
		
		
		
		
	<?php } ?>
		
		
	 <?php } ?>
	 
	 <?php if($with_count==0){?>
	 <div class="err-msg" align="center">Your balance is : <?php echo $check_count;?> <?php echo $setting[0]->site_currency;?></div>
	
	 <?php } ?>
	
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
	  <?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
		</script>
    </div>
	 <?php } ?>
</body>
</html>
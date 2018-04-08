<!DOCTYPE html>
<html lang="en">
  <head>
   
   @include('admin.title')
    
    @include('admin.style')
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            @include('admin.sitename');

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('admin.welcomeuser')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('admin.menu')
			
			
			
			
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       @include('admin.top')
		
		<?php $url = URL::to("/"); ?>
		
		
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pending Withdrawal</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
					
                  </div>
				 
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>SNo</th>
											<th>Shop Name</th>
											<th>Email</th>
											<th>Mobile No</th>
											<th>User Id</th>
											<th>Shop Id</th>
											<th>Withdraw Amt</th>
											<th>Withdraw Mode</th>
											<th>Paypal Id</th>
											<th>Bank Acc No</th>
											<th>Bank Info</th>
											<th>IFSC Code</th>
											<th>Status</th>
											<th>Make a payment status</th>
						  
						  
						  
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $sno=0;
					  foreach ($withdraw as $draw) {
						  $sno++;
					


					
					  ?>
    
						
                        <tr>
						 <td><?php echo $sno; ?></td>
						 
                          <td><?php echo $draw->shop_name;?></td>
                          
						  <td><?php echo $draw->email;?></td>
						  
						   <td><?php echo $draw->shop_phone_no;?></td>
						   
						   
						   
						   
						   <td><?php echo $draw->id;?></td>
						   
						   <td><?php echo $draw->withdraw_shop_id;?></td>
						   
						   <td><?php echo $draw->withdraw_amt.' '.$setting[0]->site_currency;?></td>
						   
						   <td><?php echo $draw->withdraw_mode;?></td>
						   
						   <td><?php echo $draw->paypal_id;?></td>
						   
						   <td><?php echo $draw->bank_acc_no;?></td>
						   
						   <td><?php echo $draw->bank_info;?></td>
						   
						   <td><?php echo $draw->ifsc_code;?></td>
						   
						    <td><?php echo $draw->withdraw_status;?></td>
						   
						   
						   <?php if($draw->withdraw_status=="completed"){ ?>
						   <td><?php echo '-';?></td>
						   <?php } ?>
						    <?php if($draw->withdraw_status=="pending"){ ?>
							<td>
					<?php if(config('global.demosite')=="yes"){?>		
					<a href="#" class="btn btn-success btndisable">Mark as Complete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>		
							<a href="<?php echo $url;?>/admin/pending_withdraw/{{ $draw->wid }}" class="btn btn-success" onclick="return confirm('Are you sure?')">Mark as Complete</a>
				  <?php } ?>
							
							
							</td>
							<?php } ?>
							
						 
                        </tr>
                        <?php } ?>
                       
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
			  
			  
			  
		 
		  
		  
		  
        </div>
        <!-- /page content -->

      @include('admin.footer')
      </div>
    </div>

    <?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
		</script>
    </div>
	 <?php } ?>
	
  </body>
</html>

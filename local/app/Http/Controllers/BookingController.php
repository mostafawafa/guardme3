<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Responsive\Http\Requests;
use Responsive\User;

use Mail;
use Auth;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
	
	
	public function sangvish_showpage($shop_id,$service_id,$userid) {
		
		 $uber = DB::table('users')->where('id', '=', $userid)->get();
		 
		 $subservice=DB::table('subservices')->where('subid', '=', $service_id)->get();
		  $shop = DB::table('shop')
               ->where('id', '=', $shop_id)
                ->get();
		 
		 
		 $seller_services=DB::table('seller_services')
		 ->leftJoin('subservices', 'subservices.subid', '=', 'seller_services.subservice_id')
		 ->where('seller_services.user_id', '=', $userid)->get();
		 
		 
		 
		  $shop_id = $shop[0]->id;
		
		$booking_days=$shop[0]->booking_opening_days;
		$booking_per_hour=$shop[0]->booking_per_hour;
		$cur_date=date("Y-m-d");
		$exp_date=date("Y-m-d",strtotime($cur_date.'+'.$booking_days.'days'));
		$start_time=$shop[0]->start_time;
		$end_time=$shop[0]->end_time;

		$shop_days=$shop[0]->shop_date;
		$days="";
		$sel=explode("," , $shop_days);
		$lev=count($sel);
		for($i=0;$i<$lev;$i++)
		{
			$date_id=$sel[$i];
			$days.="day==".$date_id;
			$days.="||";		
		}
		 $days=trim($days,"||");
		
		
		
		
		
		
		
				
				
				
     
	
		
		$set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();
		
		
	 
	  $data = array( 'shop' => $shop,  'setting' => $setting, 'seller_services' => $seller_services, 'subservice' => $subservice,
	  'booking_per_hour' => $booking_per_hour, 'start_time' => $start_time, 'end_time' => $end_time, 'shop_id' => $shop_id, 'userid' => $userid,
	  'days' => $days, 'exp_date' => $exp_date);
      return view('booking')->with($data);
   }
   
   public function viewbook()
   {
	   return view('booking_info');
	   
   }
   
   
	
	public function sangvish_savedata(Request $request) {
       
        
       $data = $request->all();
	   
	  
	   
	    $services=$data['services'];
		$getserv="";
		foreach($services as $getservice)
		{
			$getserv .=$getservice.',';
		}
		$viewservicee=rtrim($getserv,",");
		
		$booking_per_hour=$data['booking_per_hour'];
		$start_time=$data['start_time'];
		$end_time=$data['end_time'];
		$shop_id=$data['shop_id'];
		$services_id=$data['services_id'];
		$booking_date=date("Y-m-d",strtotime($data['datepicker']));
		$time=$data['time'];
		$payment_mode=$data['payment_mode'];
		
		$book_address=$data['book_address'];
		$book_city=$data['book_city'];
		$book_pincode=$data['book_pincode'];
		
		
		$status ='pending';
		$cur_date=date("Y-m-d");
		
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$currency=$setts[0]->site_currency;
		
		
		
		if (Auth::guest()) 
		{
		$name=$data['name'];
		$email=$data['email'];
		
		$phoneno=$data['phoneno'];
		$password=bcrypt($data['password']);
		$gender=$data['gender'];
		$usertype=$data['usertype'];
		}
		else if (Auth::check())
		{
			$idd = Auth::user()->id;
		
		$userdetails = DB::table('users')
		 ->where('id', '=', $idd)
		 ->get();
			$email=$userdetails[0]->email;
			$userid=$userdetails[0]->id;
		}
		$token=$data['_token'];
		
		
		$count = DB::table('booking')
		         ->where('booking_date', '=', $booking_date)
				 ->where('booking_time', '=', $time)
				 ->count();
		$count_two =DB::table('booking')
		            ->where('status', '=', 'pending')
					->where('token', '=', $token)
					->where('user_email', '=', $email)
                    ->orderBy('book_id', 'desc')
                    ->count();	

		$usercount = DB::table('users')
	                 ->where('email', '=', $email)
					 ->count(); 
		if(	$count < $booking_per_hour )
		{
			
			
			
			
					  
					  
			if (Auth::guest()) 
			{
				$getidvals =DB::table('users')
			          ->orderBy('id', 'desc')
					  ->get();
            $usernewids = $getidvals[0]->id+1;				
			}
			else if (Auth::check())
			{
				$userdetails = DB::table('users')
		 ->where('id', '=', $idd)
		 ->get();
			
			$usernewids=$userdetails[0]->id;
			}
			
			
		   	if($count_two==0)
			{
				DB::insert('insert into booking (token,services_id,booking_date,booking_time,user_email,booking_address,booking_city,booking_pincode,user_id,payment_mode,status,shop_id,currency,curr_date) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$token,
				$viewservicee,$booking_date,$time,$email,$book_address,$book_city,$book_pincode,$usernewids,$payment_mode,$status,$shop_id,$currency,$cur_date]);
			}
			else
			{
				DB::update('update booking set services_id="'.$viewservicee.'",booking_date="'.$booking_date.'",booking_time="'.$time.'",booking_address="'.$book_address.'",
				booking_city="'.$book_city.'",booking_pincode="'.$book_pincode.'",payment_mode="'.$payment_mode.'",user_id="'.$usernewids.'",shop_id="'.$shop_id.'",currency="'.$currency.'",curr_date="'.$cur_date.'" where user_email ="'.$email.'" and status="pending" and token="'.$token.'"');
			
			
			}
			
			
			
			
			if($usercount==0)
			{
				$input['email'] = $data['email'];
                $input['name'] = $data['name'];
				$rules = array(
        'email'=>'required|email|unique:users,email',
		'name' => 'required|regex:/^[\w-]*$/|max:255|unique:users,name'
		);
				$validator = Validator::make($input, $rules);
				if ($validator->fails())
				{
					return redirect()->back()->with('message', 'Username or email address invalid');
				}
				else
				{
				
				DB::insert('insert into users (name,email,password,phone,admin,gender,remember_token) values (?, ?, ?, ?, ?, ?, ?)', [$name,$email,$password,$phoneno,
				$usertype,$gender,$token]);
				
				
				if (Auth::guest()) 
				{
					if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
						{
	               
				   return redirect('booking_info');
				   }
				}
				else if (Auth::check())
				{
					return redirect('booking_info');
				}
				
				
				
				
				
				
				
				
				}
			}
			else
			{
			
				if (Auth::guest()) 
				{
					if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
						{
	   
				   return redirect('booking_info');
				   }
				}
				else if (Auth::check())
				{
					return redirect('booking_info');
				}
			
			} 
			
			
			
			
			
			
			
			
						
			
			 
			
		}
		else
		{
			/*return back()->with('error', 'That time already booked.Please select another time');*/
			return redirect()->back()->with('message', 'That time already booked.Please select another time');
		}
				 
		
		
		
		
    }
	
	
	
	
	
	
}

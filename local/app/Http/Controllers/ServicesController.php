<?php

namespace Responsive\Http\Controllers;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
	public function __construct()
    {
        $this->middleware('auth');
    }
 
	 
    public function sangvish_index()
    {
        $services = DB::table('services')->orderBy('name', 'asc')->get();
		
		$set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();
		
		$uuid=Auth::user()->id;
		$uid=Auth::user()->email;
		
		$shopview = DB::table('shop')->where('seller_email', $uid)->get();
		
		$viewservice = DB::table('seller_services')
		->where('user_id', $uuid)
		->orderBy('id','desc')
		->leftJoin('subservices', 'subservices.subid', '=', 'seller_services.subservice_id')
		->get();
		
		$editid="";
		
		
		$data = array('services' => $services, 'setting' => $setting, 'shopview' => $shopview, 'uuid' => $uuid, 'viewservice' => $viewservice, 'editid' => $editid);

        return view('services')->with($data); 
		  
    }
	
	
	public function sangvish_destroy($did) {
		
		
      DB::delete('delete from seller_services where id = ?',[$did]);
	   
      
	 
	  return redirect('services');
      
   }
   
   
   public function sangvish_editdata($id) {
       $services = DB::table('services')->orderBy('name', 'asc')->get();
	   $set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();
		
		$uuid=Auth::user()->id;
		$uid=Auth::user()->email;
		
		$shopview = DB::table('shop')->where('seller_email', $uid)->get();
		
		$viewservice = DB::table('seller_services')
		->where('user_id', $uuid)
		->orderBy('id','desc')
		->leftJoin('subservices', 'subservices.subid', '=', 'seller_services.subservice_id')
		->get();
		
		
		$sellservices = DB::select('select * from seller_services where id = ?',[$id]);
		$editid=$id;
	   
      $data = array('services' => $services, 'setting' => $setting, 'shopview' => $shopview, 'uuid' => $uuid, 'viewservice' => $viewservice , 'sellservices' => $sellservices,
	  'editid' => $editid);

        return view('services')->with($data); 
   }
   
   
   protected function sangvish_savedata(Request $request)
   {
	   $data = $request->all();
	   $subservice_id=$data['subservice_id'];
	   
	   $price=$data['price'];
	   $time=$data['time'];
	   $user_id=$data['user_id'];
	   $shop_id=$data['shop_id'];
	   
	   $editid=$data['editid'];
	   
	   $servi_id=DB::table('subservices')->where('subid', $subservice_id)->get();
	   $service_id = $servi_id[0]->service;
	   
	   $servicecnt = DB::table('seller_services')
				->where('user_id', '=', $user_id)
				->where('shop_id', '=', $shop_id)
				->where('subservice_id', '=', $subservice_id)
				->count();
	   
	   if($editid=="")
	   {
	   
			   if($servicecnt==0)
			   
			   {
			   DB::insert('insert into seller_services (service_id,subservice_id,price,time,user_id,shop_id) values (?, ?, ?, ?, ?, ?)', [$service_id,$subservice_id,$price,$time,$user_id,$shop_id]);
				
			   return back()->with('success', 'Services has been added');
			   }
			   else
			   {
				   return back()->with('error','That services is already added.');
			   }
	   }
       else if($editid!="")
       {
		   DB::update('update seller_services set service_id="'.$service_id.'",subservice_id="'.$subservice_id.'",price="'.$price.'",time="'.$time.'",shop_id="'.$shop_id.'" where id = ?', [$editid]);
			return back()->with('success', 'Services has been updated');
	   }		   
	   
   }
   
   
	
}
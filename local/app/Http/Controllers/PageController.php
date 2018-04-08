<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Mail;
use Auth;
use Crypt;
use URL;

class PageController extends Controller
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
    public function sangvish_about()
    {
       
		$about_id = 1;
		$about = DB::table('pages')
		       ->where('page_id', '=', $about_id)
			   ->get();
	
		$data = array('about' => $about);
            return view('about')->with($data);
    }
	
	public function sangvish_404()
    {
		return view('404');
	}
	
	public function sangvish_terms()
    {
       
		$term_id = 2;
		$term = DB::table('pages')
		       ->where('page_id', '=', $term_id)
			   ->get();
		
		$data = array('term' => $term);
            return view('terms-conditions')->with($data);
    }
	
	
	
	public function sangvish_privacy()
    {
       
		$privacy_id = 3;
		$privacy = DB::table('pages')
		       ->where('page_id', '=', $privacy_id)
			   ->get();
	
		$data = array('privacy' => $privacy);
            return view('privacy-policy')->with($data);
    }
	
	
	
	public function sangvish_contact()
    {
       
		$contact_id = 4;
		$contact = DB::table('pages')
		       ->where('page_id', '=', $contact_id)
			   ->get();
	
		$data = array('contact' => $contact);
            return view('contact')->with($data);
    }
	
	
	
	public function sangvish_howit()
    {
       
		$how_id = 5;
		$how = DB::table('pages')
		       ->where('page_id', '=', $how_id)
			   ->get();
	
		$data = array('how' => $how);
            return view('how-it-works')->with($data);
    }
	
	
	
	
	public function sangvish_safety()
    {
       
		$safety_id = 6;
		$safety = DB::table('pages')
		       ->where('page_id', '=', $safety_id)
			   ->get();
	
		$data = array('safety' => $safety);
            return view('safety')->with($data);
    }
	
	
	
	public function sangvish_guide()
    {
       
		$guide_id = 7;
		$guide = DB::table('pages')
		       ->where('page_id', '=', $guide_id)
			   ->get();
	
		$data = array('guide' => $guide);
            return view('service-guide')->with($data);
    }
	
	
	
	public function sangvish_topages()
    {
       
		$topages_id = 8;
		$topages = DB::table('pages')
		       ->where('page_id', '=', $topages_id)
			   ->get();
	
		$data = array('topages' => $topages);
            return view('how-to-pages')->with($data);
    }
	
	
	
	public function sangvish_stories()
    {
       
		$stories_id = 9;
		$stories = DB::table('pages')
		       ->where('page_id', '=', $stories_id)
			   ->get();
	
		$data = array('stories' => $stories);
            return view('success-stories')->with($data);
    }
	
	
	
	
	
	
	public function sangvish_mailsend(Request $request)
	{
		$data = $request->all();
		
		$name = $data['name'];
		$email = $data['email'];
		$phone_no = $data['phone_no'];
		$msg = $data['msg'];
		
		
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/settings/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		
		$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
		
		$admin_email = $admindetails->email;
		
		
		$datas = [
            'name' => $name, 'email' => $email, 'phone_no' => $phone_no, 'msg' => $msg, 'site_logo' => $site_logo, 'site_name' => $site_name
        ];
		
		Mail::send('contactemail', $datas , function ($message) use ($admin_email,$name,$email)
        {
            $message->subject('New Enquiry Received');
			
            $message->from($admin_email, $name);

            $message->to($admin_email);

        }); 
		
		
		
		
		return redirect()->back()->with('message', 'Your message sent successfully');
		
	}
	
	
	
	
}

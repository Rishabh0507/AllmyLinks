<?php

namespace App\Http\Controllers;

use App\User;
use App\links;
use App\profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function price()
    {
        return view('welcome');
    }
    public function users()
    {
        $getUsersList = DB::table('profile')
                        ->select("user_name",'profile_image')
                        ->where('is_profile_public', 1)
                        ->get();
        // dd($getUsersList);
        return view('users',compact('getUsersList'));
    }
    //search users
    public function getSearchUser(Request $request)
    {
        $getUsersList = DB::table('profile')
        ->select("user_name",'profile_image')
        ->where('is_profile_public', 1)
        ->Where('user_name', 'like', '%'.$request->search_by.'%')
        ->get();

        return view('users',compact('getUsersList'));
    }

    public function profile()
    {
        $getData = DB::table('profile')->select("*")->where('user_id', Auth::user()->id)->get();
        $getaccountData = DB::table('users')
                            ->join('profile', 'profile.user_id','=','users.id')
                            ->select("users.name",'users.email','users.is_email_verified','profile.is_profile_public')->where('users.id', Auth::user()->id)->get();
        $getLinks =  DB::table('links')->select("*")->where('user_id', Auth::user()->id)->get();
        $totalClicks = DB::table('links')->where('user_id', Auth::user()->id)->sum('click_count');
        return view('profile', compact('getData','getaccountData','getLinks','totalClicks'));
    }

    public function postSaveProfile(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'user_name'=>'required|string|max:255',
            'authId' => 'required',
            'user_location'=>'required',
            'user_image' => 'mimes:jpeg,png,pdf,jpg',
         ]);
        $file = $request->file('user_image');
        if($file)
        {
            $file_name = "allMyLinksProfile"."_".Auth::user()->email.".".$file->getClientOriginalExtension();
        }
        $newOrUpdate =  profiles::where('user_id', $request->authId)->get();
        // dd($newOrUpdate[0]->id);
        if($newOrUpdate->count() != 0)
        {
            $findtoUpdate = profiles::find($newOrUpdate[0]->id);
            $findtoUpdate->user_id = $request->authId;
            $findtoUpdate->user_name = $request->user_name;
            $findtoUpdate->location = $request->user_location;
            if($file)
            {
                $file_path = public_path('media') . '\\' . $file_name;
                $file->move(public_path('media'), $file_name);
                $findtoUpdate->profile_image = $file_name;
            }
            $findtoUpdate->gravatar_email = $request->user_gravatar_email;
            $findtoUpdate->bio = $request->user_bio;
            $findtoUpdate->user_bio_color = $request->bio_color;
            $findtoUpdate->save();
            session()->flash('message','Profile Update Successfully');
            session()->flash('type','success');

            return redirect()->back();
        } 
        else{
            $userData = new profiles;
            $userData->user_id = $request->authId;
            $userData->user_name = $request->user_name;
            $userData->location = $request->user_location;
            if($file)
            {
                $file_path = public_path('media') . '\\' . $file_name;
                $file->move(public_path('media'), $file_name);
                $userData->profile_image = $file_name;
            }
            $userData->gravatar_email = $request->user_gravatar_email;
            $userData->bio = $request->user_bio;
            $userData->user_bio_color = $request->bio_color;
            $userData->save();
        
            session()->flash('message','Profile Saved Successfully');
            session()->flash('type','success');

            return redirect()->back();
        }
    }

    public function postAddLinks(Request $request)
    {
        $this->validate($request,[
            'link_title'=>'required|string|max:255',
            'authUser' => 'required',
            'link_url'=>'required',
         ]);
         $gettitle = DB::table('links')->select('title','user_links')->where('user_id', Auth::user()->id)->get();
         
        if($gettitle[0]->title === $request->link_title || $gettitle[0]->user_links === $request->link_url)
        {
            session()->flash('message','Already Exists Try Again with new data');
            session()->flash('type','danger');
    
            return redirect()->back();
        }
        else
        {
            $storeLink = new links;
            $storeLink->user_id = $request->authUser;
            $storeLink->title = $request->link_title;
            $storeLink->user_links = $request->link_url;
            $storeLink->save();
            session()->flash('message','Link Store Successfully');
            session()->flash('type','success');
    
            return redirect()->back();
        }
    }

    public function postChangeSetting(Request $request)
    {
        $changeSetting = User::find($request->userId);
        $profileView = profiles::where('user_id', $request->userId)->get();
        $findProfilestatus = profiles::find($profileView[0]->id);
        if($request->curunt_password)
        {
           $check = Hash::check($request->curunt_password, $changeSetting->password);
           if($check == false)
           {
            session()->flash('message','Sorry Password can not updated , You enter wrong password');
            session()->flash('type','success');
    
            return redirect()->back();
           }
           else{
               $changeSetting->email = $request->setting_email;
               $changeSetting->name = $request->setting_username;
               $changeSetting->password = Hash::make($request->setting_password);
               $findProfilestatus->is_profile_public = $request->setting_public_profile;
               $changeSetting->save();
               $findProfilestatus->save();
               session()->flash('message','Settings Updated Successfully');
               session()->flash('type','success');
       
               return redirect()->back();
           }
        }
        else{
            $changeSetting->email = $request->setting_email;
            $changeSetting->name = $request->setting_username;
            $findProfilestatus->is_profile_public = $request->setting_public_profile;
            $changeSetting->save();
            $findProfilestatus->save();
            session()->flash('message','Settings Updated Successfully');
            session()->flash('type','success');
    
            return redirect()->back();
        }
        
        
    }

    public function postUpdateLink(Request $request)
    {
        $this->validate($request,[
            'link_title_update'=>'required|string|max:255',
            'update_link_id' => 'required',
            'link_url_update'=>'required',
         ]);
        $getId = links::find($request->update_link_id);
        $getId->title = $request->link_title_update;
        $getId->user_links = $request->link_url_update;
        $getId->save();
        session()->flash('message','Link Updated Successfully');
        session()->flash('type','success');
    
        return redirect()->back();
    }

    public function getUserProfile($name)
    {
        $getProfileDetails = DB::table('users')
                            ->join('profile', 'profile.user_id','=','users.id')
                            ->join('links','links.user_id','=','users.id')
                            ->select('users.name', 'users.email' ,'profile.user_name','profile.bio','profile.profile_image','profile.user_bio_color','links.id','links.title','links.user_links')
                            ->where('users.name', $name)
                            ->orwhere('profile.user_name', $name)
                            ->get();
        return view('view_this_user_profile', compact('getProfileDetails'));
    }

    public function getRedirect(Request $request)
    {
        $getUrl = links::select('id','user_links','click_count')->where('id', $request->link_id)->where('title', $request->link_title)->get();
        $updateCount = links::find($request->link_id);
        $updateCount->click_count = $getUrl[0]->click_count + 1;
        $updateCount->country_code = $request->countryName;
        $updateCount->country_flag = $request->flagName;
        $updateCount->save();
        return redirect($getUrl[0]->user_links);
    }

    public function deleteLink($id)
    {
        DB::table('links')->where('id', $id)->delete();
        session()->flash('message','Link Deleted Successfully');
        session()->flash('type','success');
    
        return redirect()->back();
    }
   
}

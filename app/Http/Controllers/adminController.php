<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function index()
    {
        $userList = User::select('id','name', 'email','is_email_verified','is_access_allowed')->get();
        return view('admin.users', compact('userList'));
    }

    public function postAccess(Request $request)
    {
        $getUser = User::find($request->userId);
        $getUser->is_access_allowed = $request->userAccess;
        $getUser->save();
        session()->flash('message','changes Updated Successfully');
        session()->flash('type','success');

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Assigned;
use App\Models\Error;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){
        $admin = User::where('usertype', '=', '99')->get();
        $developer = User::where('usertype', '=', '49')->get();
        $tester = User::where('usertype', '=', '0')->get();
        // $usertype = Auth::user()->usertype || "";
        return view("home", compact('admin', 'developer', 'tester'));
    }
    public function redirect(){
        $usertype = Auth::user()->usertype;
        $username =  Auth::user()->name;
        $allReportedErrors = Error::all();
        $allAssignedErrors = Assigned::all();
        
        if($usertype == "99"){
            return view("admin.admin-home", compact('username', 'allReportedErrors', 'allAssignedErrors'));
        }elseif($usertype == "49"){
            return view("developer.developer-home", compact('username', 'allAssignedErrors'));
        }elseif($usertype == "0"){
            return view("tester.tester-home", compact('username', "allReportedErrors"));
        }else{
            return redirect("/")->with('message', "Please wait for the Administrator to assign you a role!");
        }
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){
        return view("home");
    }
    public function redirect(){
        $usertype = Auth::user()->usertype;
        $username =  Auth::user()->name;
        $allReportedErrors = Error::all();
        
        if($usertype == "99"){
            return view("admin.admin-home", compact('username', 'allReportedErrors'));
        }elseif($usertype == "49"){
            return view("developer.developer-home", compact('username'));
        }else{
            return view("tester.tester-home", compact('username',"allReportedErrors"));
        }
    }
    
}

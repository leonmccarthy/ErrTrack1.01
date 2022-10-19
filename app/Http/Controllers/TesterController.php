<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TesterController extends Controller
{
    public function reportErrorView(){
        $username = Auth::user()->name;
        $usertype = Auth::user()->usertype;
        return view('tester.error.report-error', compact('username'));
    }

    public function reportErrorAction(Request $request){
        
    }
}

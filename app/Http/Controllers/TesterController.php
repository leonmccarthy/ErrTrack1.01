<?php

namespace App\Http\Controllers;

use App\Models\Error;
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
        $username = Auth::user()->name;
        $error = new Error();
        $error->error_name = $request->error_name;
        $error->error_description = $request->error_description;
        $error->error_steps = $request->error_steps;
        $error->error_reporter = Auth::user()->email;
        $error->save();
        return view('tester.error.report-error', compact('username'));
    }
}

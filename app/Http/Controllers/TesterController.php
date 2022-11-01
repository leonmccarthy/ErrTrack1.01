<?php

namespace App\Http\Controllers;

use App\Models\Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TesterController extends Controller
{
    // report error view
    public function reportErrorView(){
        if(Auth::user()){
            $usertype = Auth::user()->usertype;

            if($usertype=="0"){
                $username = Auth::user()->name;
                return view('tester.error.report-error', compact('username'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect("/login");
        }
        
        
    }

    // report error action
    public function reportErrorAction(Request $request){
        if(Auth::user()){
            $usertype = Auth::user()->usertype;

            if($usertype=="0"){
                $find = Error::where("error_description", "=", $request->error_description)->count();

                if ($find==0){
                    $error = new Error();
                    $error->error_name = $request->error_name;
                    $error->error_description = $request->error_description;
                    $error->error_steps = $request->error_steps;
                    $error->error_reporter = Auth::user()->email;
                    $error->save();

                    return redirect("/view-reported-errors")->with("message", "Successfully reported an error!");
                }else{
                    return redirect("/view-reported-errors")->with("error", "Failed to save! Error description already exists!");
                }
            }else{
                return redirect()->back();
            }
        }else{
            return redirect("/login");
        }
         
    }

        // viewing all reported errors
    public function viewAllReportedErrors(){
        if(Auth::user()){
            $usertype = Auth::user()->usertype;

            if($usertype=="0"){
                $username = Auth::user()->name;
                $allReportedErrors = Error::all();
                return view('tester.error.view-all-reported-errors', compact('allReportedErrors', 'username'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect("/login");
        }
                
    }
}

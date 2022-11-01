<?php

namespace App\Http\Controllers;

use App\Models\Assigned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeveloperController extends Controller
{
    //viewing all assigned errors
    public function viewAllAssignedErrors(){
        if(Auth::user()){
            $usertype = Auth::user()->usertype;

            if($usertype=="49"){
                $assignedErrors = Assigned::all();
                $username = Auth::user()->name;
                return view('developer.error.view-all-assigned-errors', compact('username', 'assignedErrors'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect("/login");
        }
        
        
    }

    // viewing my assigned errors
    public function viewMyAssignedErrors(){
        if(Auth::user()){
            $usertype = Auth::user()->usertype;

            if($usertype=="49"){
                $useremail = Auth::user()->email;
                $assignedErrors = Assigned::where('error_dev_assigned', '=', $useremail)->get();
                $username = Auth::user()->name;
                return view('developer.error.my-assigned-errors', compact('username', 'assignedErrors'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect("/login");
        }
        
        
    }

    // editing steps done view
    public function editStepsDoneView($id){
        if(Auth::user()){
            $usertype = Auth::user()->usertype;

            if($usertype=="49"){
                $username = Auth::user()->name;
                $assignedErrorToBeEdited = Assigned::find($id);
                return view('developer.error.edit-steps-done', compact('username', 'assignedErrorToBeEdited'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect("/login");
        }
        
    }

    // editing steps done action
    public function editStepsDoneAction(Request $request, $id){
        if(Auth::user()){
            $usertype = Auth::user()->usertype;
        
            if($usertype=="49"){
                $assignedErrorToBeEdited = Assigned::find($id);

                if($request->error_steps_done=="" || $request->error_steps_done>$assignedErrorToBeEdited->error_steps_to_complete){
                    $assignedErrorToBeEdited->error_steps_done = $assignedErrorToBeEdited->error_steps_done;
                    return redirect('/view-my-errors')->with('error', "Failed to save! Steps done cannot be greater than total steps!");
                }else{
                    $assignedErrorToBeEdited->error_steps_done = $request->error_steps_done;
                    $assignedErrorToBeEdited->save();
                    return redirect('/view-my-errors')->with('message', "Steps done changed successfully!");
                }
            }else{
                return redirect()->back();
            }
        }else{
            return redirect("/login");
        }
        
        
    }

    // editing steps to completion view
    public function editStepsToCompletionView($id){
        if(Auth::user()){
            $usertype = Auth::user()->usertype;

            if($usertype=="49"){
                $username = Auth::user()->name;
                $assignedErrorToBeEdited = Assigned::find($id);
                return view('developer.error.edit-steps-to-complete', compact('username', 'assignedErrorToBeEdited'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect("/login");
        }
        
    }

    // editing steps to completion action
    public function editStepsToCompletionAction(Request $request, $id){
        if(Auth::user()){
            $usertype = Auth::user()->usertype;

        if($usertype=="49"){
            $assignedErrorToBeEdited = Assigned::find($id);

            if($request->error_steps_to_complete==""){
                $assignedErrorToBeEdited->error_steps_to_complete = $assignedErrorToBeEdited->error_steps_to_complete;
                return redirect('/view-my-errors')->with('error', "Failed to save!");
            }else{
                $assignedErrorToBeEdited->error_steps_to_complete = $request->error_steps_to_complete;
                $assignedErrorToBeEdited->save();
                return redirect('/view-my-errors')->with('message', "Total steps changed successfully!");  
            }
        }else{
            return redirect()->back();
        }

        }else{
            return redirect("/login");
        }                
    }
}

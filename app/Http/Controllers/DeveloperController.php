<?php

namespace App\Http\Controllers;

use App\Models\Assigned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeveloperController extends Controller
{
    //viewing all assigned errors
    public function viewAllAssignedErrors(){
        $assignedErrors = Assigned::all();
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        return view('developer.error.view-all-assigned-errors', compact('username', 'assignedErrors'));
    }

    // viewing my assigned errors
    public function viewMyAssignedErrors(){
        $useremail = Auth::user()->email;
        $assignedErrors = Assigned::where('error_dev_assigned', '=', $useremail)->get();
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        return view('developer.error.my-assigned-errors', compact('username', 'assignedErrors'));
    }

    // editing steps done view
    public function editStepsDoneView($id){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $assignedErrorToBeEdited = Assigned::find($id);
        return view('developer.error.edit-steps-done', compact('username', 'assignedErrorToBeEdited'));

    }

    // editing steps done action
    public function editStepsDoneAction(Request $request, $id){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $useremail = Auth::user()->email;
        $assignedErrorToBeEdited = Assigned::find($id);

        if($request->error_steps_done=="" || $request->error_steps_done>$assignedErrorToBeEdited->error_steps_to_complete){
            $assignedErrorToBeEdited->error_steps_done = $assignedErrorToBeEdited->error_steps_done;
            return redirect('/view-my-errors')->with('error', "Failed to save! Steps done cannot be greater than total steps!");
        }else{
            $assignedErrorToBeEdited->error_steps_done = $request->error_steps_done;
            $assignedErrorToBeEdited->save();
            return redirect('/view-my-errors')->with('message', "Steps done changed successfully!");
        }
    }

    // editing steps to completion view
    public function editStepsToCompletionView($id){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $assignedErrorToBeEdited = Assigned::find($id);
        return view('developer.error.edit-steps-to-complete', compact('username', 'assignedErrorToBeEdited'));

    }

    // editing steps to completion action
    public function editStepsToCompletionAction(Request $request, $id){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $useremail = Auth::user()->email;
        $assignedErrorToBeEdited = Assigned::find($id);

        if($request->error_steps_to_complete==""){
            $assignedErrorToBeEdited->error_steps_to_complete = $assignedErrorToBeEdited->error_steps_to_complete;
            return redirect('/view-my-errors')->with('error', "Failed to save!");
        }else{
            $assignedErrorToBeEdited->error_steps_to_complete = $request->error_steps_to_complete;
            $assignedErrorToBeEdited->save();
            return redirect('/view-my-errors')->with('message', "Total steps changed successfully!");  
        }
    }
}

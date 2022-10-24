<?php

namespace App\Http\Controllers;

use App\Models\Assigned;
use App\Models\Error;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function addDeveloper(){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        return view('admin.manage_users.add-dev', compact('username'));
    }

    public function viewAllUsers(){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $allUsers = User::all();
        return view('admin.manage_users.view-all-users', compact('allUsers', 'username'));
    }

    // converting a developer into a tester
    public function makeTester($id){
        $user = User::find($id);
        $user->usertype = '0';
        $user->save();
        return redirect()->back();
    }

    //converting a tester into a developer
    public function makeDeveloper($id){
        $user = User::find($id);
        $user->usertype = '49';
        $user->save();
        return redirect()->back();
    }

    //converting a tester or developer into admin
    public function makeAdmin($id){
        $user = User::find($id);
        $user->usertype = '99';
        $user->save();
        return redirect()->back();
    }

    // deleting a user
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete($id);
        return redirect()->back();
    }

    // viewing all reported errors
    public function viewAllReportedErrors(){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $allReportedErrors = Error::all();
        return view('admin.manage_errors.view-all-reported-errors', compact('allReportedErrors', 'username'));
    }

    // report error view
    public function assignErrorView($id){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $errorToBeAssigned = Error::find($id);
        $developer = User::where('usertype', '=', '49')->get();
        return view('admin.manage_errors.assign-error', compact('username', 'errorToBeAssigned', 'developer'));
    }

        // assign error action
        public function assignErrorAction(Request $request, $id){
            $usertype = Auth::user()->usertype;
            $username = Auth::user()->name;
            $errorReported = Error::find($id);
            $assignError = new Assigned();
            $assignError->error_name  = $errorReported->error_name;
            $assignError->error_description  = $errorReported->error_description;
            $assignError->error_steps  = $errorReported->error_steps;
            $assignError->error_reporter  = $errorReported->error_reporter;
            $assignError->error_steps_done = 0 ;
            $assignError->error_steps_to_complete = 1 ;
            $assignError->error_priority  = $request->error_priority;
            $assignError->error_dev_assigned  = $request->error_dev_assigned;
            $assignError->error_assigner = $username;
            $assignError->save();
            $errorReported->assignment_status = "1";
            $errorReported->save();
            
            $allAssignedErrors = Assigned::all();
            return view('admin.manage_errors.view-all-assigned-errors', compact('allAssignedErrors', 'username'));
        }

        // viewing all assigned errors
    public function viewAllAssignedErrors(){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $allAssignedErrors = Assigned::all();
        return view('admin.manage_errors.view-all-assigned-errors', compact('allAssignedErrors', 'username'));
    }

    // edit assign error view
    public function editAssignedErrorView($id){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $assignedErrorToBeEdited = Assigned::find($id);
        $developer = User::where('usertype', '=', '49')->get();
        return view('admin.manage_errors.edit-assigned-error', compact('username', 'assignedErrorToBeEdited', 'developer'));
    }

     // assign error action
     public function editAssignedErrorAction($id, Request $request){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $assignedErrorToBeEdited = Assigned::find($id);
        $allAssignedErrors = Assigned::all();
        // $developer = User::where('usertype', '=', '49')->get();
        if(!$request->error_priority){
            $assignedErrorToBeEdited->error_priority = $assignedErrorToBeEdited->error_priority;
        }else{
            $assignedErrorToBeEdited->error_priority = $request->error_priority;
        }
        if(!$request->error_priority){
            $assignedErrorToBeEdited->error_dev_assigned = $assignedErrorToBeEdited->error_dev_assigned;
        }else{
            $assignedErrorToBeEdited->error_dev_assigned = $request->error_dev_assigned;
        }
        $assignedErrorToBeEdited->error_dev_assigned = $request->error_dev_assigned;
        $assignedErrorToBeEdited->save();

        return view('admin.manage_errors.view-all-assigned-errors', compact('allAssignedErrors', 'username'));
    }
}

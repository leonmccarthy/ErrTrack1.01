<?php

namespace App\Http\Controllers;

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
        return view('admin.manage_errors.assign-error-view', compact('username', 'errorToBeAssigned', 'developer'));
    }

    public function assignErrorViewTest(){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        // $errorToBeAssigned = Error::find($id);
        return view('admin.manage_errors.assign-error-view-test', compact('username'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function adddeveloper(){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        return view('admin.manage_users.add-dev', compact('username'));
    }

    public function viewAllUsers(){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $allUsers = User::all();
        return view('admin.manage_users.viewAllUsers', compact('allUsers', 'username'));
    }

    // converting a developer into a tester
    public function maketester($id){
        $user = User::find($id);
        $user->usertype = '0';
        $user->save();
        return redirect()->back();
    }

    //converting a tester into a developer
    public function makedeveloper($id){
        $user = User::find($id);
        $user->usertype = '49';
        $user->save();
        return redirect()->back();
    }

    //converting a tester or developer into admin
    public function makeadmin($id){
        $user = User::find($id);
        $user->usertype = '99';
        $user->save();
        return redirect()->back();
    }

    // deleting a user
    public function deleteuser($id){
        $user = User::find($id);
        $user->delete($id);
        return redirect()->back();
    }
}

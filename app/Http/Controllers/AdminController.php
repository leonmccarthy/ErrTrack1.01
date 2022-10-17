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
}

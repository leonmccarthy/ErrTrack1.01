<?php

namespace App\Http\Controllers;

use App\Models\Assigned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeveloperController extends Controller
{
    //
    public function viewAllAssignedErrors(){
        $assignedErrors = Assigned::all();
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        return view('developer.error.view-all-assigned-errors', compact('username', 'assignedErrors'));
    }

    public function viewMyAssignedErrors(){
        $useremail = Auth::user()->email;
        $assignedErrors = Assigned::where('error_dev_assigned', '=', $useremail)->get();
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        return view('developer.error.my-assigned-errors', compact('username', 'assignedErrors'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AdminController extends Controller
{
    public function homepage() {
        
        if (Auth::check()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype === "user") {

                return view('dashboard.blade.php');
            } else if ($usertype === "admin") {
                $users = User::all();

                return view('admin.adminpanel', ['users' => $users]);
            }
        }

        return redirect()->route('login');
    }
}

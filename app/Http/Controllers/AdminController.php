<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function homepage() {
        
        if (Auth::check()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype === "user") {

                return view('dashboard');
            } else if ($usertype === "Admin") {
                $userCount = User::count();

                return view('admin.update-news', ['userCount' => $userCount]);
            }
        }

        return redirect()->route('login');
    }

    public function users() {
        $users = User::all();

        return view('admin.admin-panel', ['users' => $users]);
    }

    public function managepets() {
        return view('admin.manage-pets');
    }

    public function notifications() {
        return view('admin.notification');
    }

    public function messages() {
        return view('admin.messages');
    }

    public function editProfile(Request $request): View {

        return view('admin.edit-profile', [
            'user' => $request->user(),
        ]);
    }

}

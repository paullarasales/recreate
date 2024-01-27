<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pet;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function homepage() {

        if (Auth::check()) {

            $usertype = (Auth()->user()->usertype);

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

    //Manage Pets
    public function managepets() {
        return view('admin.manage-pets');
    }

    //Pet Listing
    public function viewLIst() {
        $pets = Pet::paginate(10);
        return view('admin.pet-listing', ['pets' => $pets]);
    }

    //Notification
    public function notifications() {
        return view('admin.notification');
    }

    //Messages
    public function messages() {
        return view('admin.messages');
    }

    //Edit Admin Profile
    public function editProfile(Request $request): View {

        return view('admin.edit-profile', [
            'user' => $request->user(),
        ]);
    }


}

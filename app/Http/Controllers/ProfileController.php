<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();
    
        if ($request->hasFile('profile')) {
            $request->validate([
                'profile' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
    
            $file->storeAs('profiles', $filename, 'public');
    
            $data['profile'] = 'profiles/' . $filename;
        }
    
        $user->fill($data);
    
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        $user->save();
    
        return redirect()->route('edit')->with('status', 'profile-updated');
    }   

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
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
    
            // Store the file in the public disk under the 'profiles' directory
            $file->storeAs('profiles', $filename, 'public');
    
            // Update the user's profile with the file path or filename as needed
            $data['profile'] = 'profiles/' . $filename;
        }
    
        $user->fill($data);
    
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        $user->save();
    
        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }   

     /**
     * Delete the user's account.
     */
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

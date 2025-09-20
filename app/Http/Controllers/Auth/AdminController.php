<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{


    /**
     * Show all users to the admin.
     */
    public function index()
    {
        $superAdmin = User::find(1);
        $user = Auth::user();

        // If user not logged in or user is not admin
        if (!$user || $user->USER_TYPE !== 0) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Access denied. Please log in again.');
        }

        $users = User::all();
        return view('pages.admin', compact('users','superAdmin'));
    }

    /*
     * admin profile
     * */
    public function profile()
    {
        $superAdmin = User::find(1); // the first user : super admin
        return view('admin.profile', compact('superAdmin'));
    }
    /*
    * Update Admin
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email|unique:USER,EMAIL,' . $user->USER_ID . ',USER_ID',
            'password'       => 'nullable|confirmed|min:6',
            'profile_photo'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'address'        => 'required|string|max:255',
            'phone_num'      => 'required|string|max:255',
            'bio'            => 'nullable|string|max:255',
            'job_title'      => 'required|string|max:255',
            'birthday'       => 'required|date',
            'github'         => 'nullable|string|max:255',
            'linked_in'      => 'nullable|string|max:255',
            'instagram'      => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = uniqid('avatar_', true) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/avatars'), $filename);
            $user->AVATAR = 'images/avatars/' . $filename;
        }

        $user->FIRST_NAME    = $request->first_name;
        $user->LAST_NAME     = $request->last_name;
        $user->EMAIL         = $request->email;
        $user->ADDRESS       = $request->address;
        $user->PHONE_NUM     = $request->phone_num;
        $user->BIO           = $request->bio;
        $user->JOB_TITLE     = $request->job_title;
        $user->BIRTHDAY      = $request->birthday;
        $user->GITHUB_URL    = $request->github;
        $user->LINKEDIN_URL  = $request->linked_in;
        $user->INSTAGRAM_URL = $request->instagram;

        if ($request->filled('password')) {
            $user->PW = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated!');
    }
    /**
     * Promote a user to admin.
     */
    public function promote($id)
    {
        $user = User::findOrFail($id);

        if ($user->USER_TYPE === 0) {
            return redirect()->back()->with('message', 'User is already an admin.');
        }

        $user->USER_TYPE = 0;
        $user->save();

        return redirect()->back()->with('success', 'User promoted to admin.');
    }

    public function demote($id)
    {
        $user = User::findOrFail($id);

        if ($user->USER_TYPE === 0) {
            $user->USER_TYPE = 1;
            $user->save();
            return redirect()->back()->with('message', 'User is back to a normal user.');

        }

        return redirect()->back()->with('success', 'User is already just a user');
    }


    /**
     * Delete a user.
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);

        // Prevent admin from deleting themselves
        if ($user->USER_ID === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot delete yourself.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted.');
    }
}

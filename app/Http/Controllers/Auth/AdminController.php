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
        $user = Auth::user();

        // If user not logged in or user is not admin
        if (!$user || $user->USER_TYPE !== 0) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Access denied. Please log in again.');
        }

        $users = User::all();
        return view('pages.admin', compact('users'));
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

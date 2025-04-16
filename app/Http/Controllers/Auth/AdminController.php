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
        // Optional: check again just in case
        if (Auth::user()->USER_TYPE !== 0) {
            abort(403, 'Unauthorized');
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

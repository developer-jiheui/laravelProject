<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Handle registration.
     */
    public function register(Request $request)
    {
        // Validate user input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:USER,EMAIL',
            'password'   => 'required|confirmed|min:6',
        ]);

        // Create user
        //change this when we changed database to lower case
//        User::create([
//            'first_name' => $request->first_name,
//            'last_name' => $request->last_name,
//            'email' => $request->email,
//            'password' => Hash::make($request->password),
//            'user_type' => 1, // default role
//        ]);
        // Create user
        User::create([
            'FIRST_NAME' => $request->first_name,
            'LAST_NAME'  => $request->last_name,
            'EMAIL'      => $request->email,
            'PW'         => Hash::make($request->password),
            'USER_TYPE'  => 1, // default: common user
        ]);

        // Redirect to login page
        return redirect()->route('page.show', ['name' => 'login'])->with('success', 'Registration successful. Please log in.');
    }


}

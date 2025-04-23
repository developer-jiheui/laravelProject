<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

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

        // Check if this is the first user
        $isFirstUser = User::count() === 0;

        // Create user and set USER_TYPE accordingly
        User::create([
            'FIRST_NAME' => $request->first_name,
            'LAST_NAME'  => $request->last_name,
            'EMAIL'      => $request->email,
            'PW'         => Hash::make($request->password),
            'USER_TYPE'  => $isFirstUser ? 0 : 1, // 0 = admin, 1 = regular user
            'AVARAR'     => 'images/my-avatar.png'
        ]);

        return redirect()->route('page.show', ['name' => 'login'])
            ->with('success', 'Registration successful. Please log in.');
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email|unique:USER,EMAIL,' . $user->USER_ID . ',USER_ID',
            'password'       => 'nullable|confirmed|min:6',
            'profile_photo'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'address'        => 'nullable|string|max:255',
            'phone_num'      => 'nullable|string|max:255',
            'bio'            => 'nullable|string|max:255',
            'job_title'      => 'nullable|string|max:255',
            'birthday'       => 'nullable|date',
            'github'         => 'nullable|string|max:255',
            'linked_in'      => 'nullable|string|max:255',
            'instagram'      => 'nullable|string|max:255',
        ]);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = uniqid('avatar_', true) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/avatars'), $filename);
            $user->AVATAR = 'images/avatars/' . $filename;
        }

        // Assign validated fields (except password and profile_photo)
        $fieldMap = [
            'first_name' => 'FIRST_NAME',
            'last_name'  => 'LAST_NAME',
            'email'      => 'EMAIL',
            'address'    => 'ADDRESS',
            'phone_num'  => 'PHONE_NUM',
            'bio'        => 'BIO',
            'job_title'  => 'JOB_TITLE',
            'birthday'   => 'BIRTHDAY',
            'github'     => 'GITHUB_URL',
            'linked_in'  => 'LINKEDIN_URL',
            'instagram'  => 'INSTAGRAM_URL',
        ];

        foreach ($fieldMap as $requestField => $dbField) {
            if (isset($validated[$requestField])) {
                $user->{$dbField} = $validated[$requestField];
            }
        }

        // Handle password separately
        if (!empty($validated['password'])) {
            $user->PW = bcrypt($validated['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated!');
    }
}

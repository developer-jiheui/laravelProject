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
        ]);

        return redirect()->route('page.show', ['name' => 'login'])
            ->with('success', 'Registration successful. Please log in.');
    }

    public function edit_profile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:USER,EMAIL,' . $user->USER_ID . ',USER_ID',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|confirmed|min:6',
            // other validations...
        ]);

        // ✅ STEP 2: Upload profile photo to Cloudinary if present
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $base64Image = base64_encode(file_get_contents($file->getRealPath()));

            $response = Http::asForm()->post('https://api.cloudinary.com/v1_1/' . env('CLOUDINARY_CLOUD_NAME') . '/image/upload', [
                'file' => 'data:' . $file->getMimeType() . ';base64,' . $base64Image,
                'upload_preset' => env('CLOUDINARY_UPLOAD_PRESET'),
                'public_id' => 'avatar_' . uniqid('cloud_', true), // ✅ Clean, no slashes
            ]);

            if ($response->successful()) {
                $user->AVATAR = $response->json('secure_url');
                $user->save();
                return back()->with('success', 'Avatar uploaded and profile updated!');
            } else {
                return back()->withErrors(['profile_photo' => 'Cloudinary error: ' . $response->body()]);
            }
        }
        // ✅ STEP 3: Update remaining fields
        if ($request->filled('first_name')) {
            $user->FIRST_NAME = $request->first_name;
        }

        if ($request->filled('last_name')) {
            $user->LAST_NAME = $request->last_name;
        }

        if ($request->filled('email')) {
            $user->EMAIL = $request->email;
        }

        if ($request->filled('address')) {
            $user->ADDRESS = $request->address;
        }

        if ($request->filled('phone_num')) {
            $user->PHONE_NUM = $request->phone_num;
        }

        if ($request->filled('bio')) {
            $user->BIO = $request->bio;
        }

        if ($request->filled('job_title')) {
            $user->JOB_TITLE = $request->job_title;
        }

        if ($request->filled('birthday')) {
            $user->BIRTHDAY = $request->birthday;
        }

        if ($request->filled('github')) {
            $user->GITHUB_URL = $request->github;
        }

        if ($request->filled('linked_in')) {
            $user->LINKEDIN_URL = $request->linked_in;
        }

        if ($request->filled('instagram')) {
            $user->INSTAGRAM_URL = $request->instagram;
        }

        if ($request->filled('password')) {
            $user->PW = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated!');
    }

// ✅ Don't forget to set CLOUD_NAME and UPLOAD_PRESET in your .env or config



    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:USER,EMAIL,' . $user->USER_ID . ',USER_ID',
            'password'   => 'nullable|confirmed|min:6',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            // add other fields validations here...
        ]);

        // Upload avatar if present
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = uniqid('avatar_', true) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/avatars'), $filename); // ✅ Move directly to public/images/avatars

            $user->AVATAR = 'images/avatars/' . $filename; // ✅ Save the path to use in <img src="{{ asset(...) }}">
        }

        if ($request->filled('first_name')) {
            $user->FIRST_NAME = $request->first_name;
        }

        if ($request->filled('last_name')) {
            $user->LAST_NAME = $request->last_name;
        }

        if ($request->filled('email')) {
            $user->EMAIL = $request->email;
        }

        if ($request->filled('address')) {
            $user->ADDRESS = $request->address;
        }

        if ($request->filled('phone_num')) {
            $user->PHONE_NUM = $request->phone_num;
        }

        if ($request->filled('bio')) {
            $user->BIO = $request->bio;
        }

        if ($request->filled('job_title')) {
            $user->JOB_TITLE = $request->job_title;
        }

        if ($request->filled('birthday')) {
            $user->BIRTHDAY = $request->birthday;
        }

        if ($request->filled('github')) {
            $user->GITHUB_URL = $request->github;
        }

        if ($request->filled('linked_in')) {
            $user->LINKEDIN_URL = $request->linked_in;
        }

        if ($request->filled('instagram')) {
            $user->INSTAGRAM_URL = $request->instagram;
        }

        if ($request->filled('password')) {
            $user->PW = bcrypt($request->password);
        }
//        if (!empty($request->password)) {
//            $user->PW = bcrypt($request->password);
//        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated!');
    }

}

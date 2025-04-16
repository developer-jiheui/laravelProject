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

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

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
            $base64Image = base64_encode(file_get_contents($request->file('profile_photo')->getRealPath()));

            $response = Http::asForm()->post('https://api.cloudinary.com/v1_1/blogAvatars/image/upload', [
                'file' => 'data:image/jpeg;base64,' . $base64Image,
                'upload_preset' => 'profile_photos', // Set this up in Cloudinary dashboard
            ]);

            if ($response->successful()) {
                $user->AVATAR = $response->json('secure_url');
            } else {
                return back()->withErrors(['profile_photo' => 'Image upload failed.']);
            }
        }

        // ✅ STEP 3: Update remaining fields
        $user->FIRST_NAME = $request->first_name;
        $user->LAST_NAME = $request->last_name;
        $user->EMAIL = $request->email;
        $user->ADDRESS = $request->address;
        $user->PHONE_NUM = $request->phone_num;
        $user->BIO = $request->bio;
        $user->JOB_TITLE = $request->job_title;
        $user->BIRTHDAY = $request->birthday;
        $user->GITHUB_URL = $request->github;
        $user->LINKEDIN_URL = $request->linked_in;
        $user->INSTAGRAM_URL = $request->instagram;

        if ($request->filled('password')) {
            $user->PW = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated!');
    }

// ✅ Don't forget to set CLOUD_NAME and UPLOAD_PRESET in your .env or config



//    public function update(Request $request, $id)
//    {
//        $user = \App\Models\User::findOrFail($id);
//
//        $request->validate([
//            'first_name' => 'required|string|max:255',
//            'last_name'  => 'required|string|max:255',
//            'email'      => 'required|email|unique:USER,EMAIL,' . $user->USER_ID . ',USER_ID',
//            'password'   => 'nullable|confirmed|min:6',
//            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
//            // add other fields validations here...
//        ]);
//
//        // Upload avatar if present
//        if ($request->hasFile('profile_photo')) {
//            $avatarPath = $request->file('profile_photo')->store('avatars', 'public');
//            $user->AVATAR = $avatarPath;
//        }
//
//        $user->FIRST_NAME = $request->first_name;
//        $user->LAST_NAME  = $request->last_name;
//        $user->EMAIL      = $request->email;
//        $user->ADDRESS    = $request->address;
//        $user->PHONE_NUM  = $request->phone_num;
//        $user->BIO        = $request->bio;
//        $user->JOB_TITLE  = $request->job_title;
//        $user->BIRTHDAY   = $request->birthday;
//        $user->GITHUB_URL = $request->github;
//        $user->LINKEDIN_URL = $request->linked_in;
//        $user->INSTAGRAM_URL = $request->instagram;
//
//        if (!empty($request->password)) {
//            $user->PW = bcrypt($request->password);
//        }
//
//        $user->save();
//
//        return redirect()->back()->with('success', 'Profile updated!');
//    }

}

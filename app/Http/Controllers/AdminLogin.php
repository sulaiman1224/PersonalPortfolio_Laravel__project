<?php

namespace App\Http\Controllers;

use App\Models\Admin_login;
use Illuminate\Http\Request;
// auth
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLogin extends Controller
{



    public function AdminLogin(){
        $profile = Admin_login::all();
        return view('admin-panel.layouts.addData.login',compact('profile'));
    }
    public function AdminLoginProfile(){
        return view('admin-panel.layouts.ViewsData.ProfileViewsData');
    }
    //edit login
    public function getprofiledata(){
        $Profile = Admin_login::all();
        return view('admin-panel.layouts.ViewsData.ProfileViewsData', compact('Profile'));
    }

    // update profile




    public function UpdateProfileData(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:admin_logins,email,' . $id,
            'password' => 'required|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Find the profile by ID
        $profile = Admin_login::findOrFail($id);

        // Update user data
        $profile->username = $request->username;
        $profile->email = $request->email;

        // Hash the password before saving
        $profile->password = Hash::make($request->password);

        // Check if there's a new image to upload
        if ($request->hasFile('image')) {
            // Store the image and update the model
            $profileImagePath = $request->file('image')->store('login_images', 'public');
            $profile->image = $profileImagePath;
        }

        // Save the updated record
        $profile->save();

        // Redirect with success message
        return redirect('/Admin/Profile/ViewsData')->with('success', 'Data updated successfully!');
    }

    // edit profile
    public function editProfileData($id){
        $Profile = Admin_login::find($id);
        return view('admin-panel.layouts.ViewsData.ProfileDataUpdate', compact('Profile'));
    }

// login


// public function admin(){
//     if(Auth::check()){
//         return view('dashboard');
//     }else{
//         return redirect()->route('/Adminlogin');
//     }

// }

// dashboard
public function dashboard(){
    return view('admin-panel.layouts.addData.HomeAddData');
}
public function adminLoginCheck(Request $request)
{
    // Validate credentials
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to log in using the admin guard
    if (Auth::guard('admin')->attempt($credentials)) {
        // Authentication was successful, redirect to intended route with a success message
        return redirect()->intended('Admin/Home')->with('success', 'Login successful! Welcome back.');
    } else {
        Log::warning('Login failed for email: ' . $request->email);

        // Return back with a specific error message
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
}



// logout
public function adminLogout()
{
    Auth::guard('admin')->logout();
    request()->session()->invalidate();

    // Regenerate the session token
    request()->session()->regenerateToken();
    return redirect()->route('AdminLogin');
}





}

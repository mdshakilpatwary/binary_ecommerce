<?php

namespace App\Http\Controllers\AdminBackend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use File;
class AdminController extends Controller
{
    public function logout(Request $request){
     // Logout the user
        Auth::logout();

     // Invalidate the session
         $request->session()->invalidate();

     // Regenerate the session token
        $request->session()->regenerateToken();

     // Redirect to the login page or any other page
        return redirect('/admin')->with('success', 'You have been logged out successfully!');
    }

    public function loginPage(){
        return view('backend.pages.login');
    }

    // admin profile part start

    public function profile(){
        $user =Auth::user();
        return view('backend.pages.profile', compact('user'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|max:100|email',
            'name' => 'required|max:150',
            'phone' => 'required|numeric|digits_between:10,16',
            'address' => 'required|max:500',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if ($request->email !== $user->email) {
            $user->email = $request->email;
        }

        if($request->file('image')){
            $manager = new ImageManager(new Driver());
            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }
            $image = $request->file('image');
            $customName = $request->name . rand() . '.' . $image->getClientOriginalExtension();            
            $img = $manager->read($image)->resize(400,350);          
            $img->toPng()->save(public_path('uploads/user/'.$customName)); 
            $user->image='uploads/user/'.$customName;
        }
        $insert = $user->update();
        if($insert){
            return redirect()->back()->with('success', 'Successfully Profile Updated');

        }
        else{
            return redirect()->back()->with('error', 'Opps! data not Update');

        }
    }

    public function password(){
        $user =Auth::user();
        return view('backend.pages.profile-password', compact('user'));
    }
    public function updatePassword(Request $request, $id){

                $user = User::findOrFail($id);
                $request->validate([
                'oldPassword' => 'required',
                'newPassword' => 'required|min:6',
                'confirmPassword' => 'required|same:newPassword',
            ],
            [
                'newPassword.require' => 'Your new password is required',
                'confirmPassword.require' => 'Your confirm password is required',
            ]);
        // Check if the old password matches
            if (!Hash::check($request->oldPassword, $user->password)) {
                return back()->with('error','The old password is incorrect.');
            }
            $user->password = Hash::make($request->newPassword);
            $msg =$user->update();
            if($msg){

                return redirect('admin/profile/password')->with('success','Password successfully changed');
            }
            else{         
                return back()->with('error','please try again');
            }
    }
    // Admin profile part end

    public function login(Request $request){
            // Validate input fields
            $request->validate([
                'email' => 'required|email|exists:users,email', // Check if the email exists in the users table
                'password' => 'required|min:4',
            ], [
                'email.exists' => 'This email is not registered in our system.', // Custom error message
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // If login is successful
                $request->session()->regenerate();
                $url ='';
                if(Auth::user()->role === 'admin' ){
                    $url ='admin/dashboard';
                }
                else if(Auth::user()->role === 'user'){
                    $url ='dashboard';
                }
                return redirect()->intended($url)->with('success', 'Login successful!');
            }

            // If credentials don't match
            return back()->with('error', 'The provided password is incorrect.');

    }



}

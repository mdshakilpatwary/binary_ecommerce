<?php

namespace App\Http\Controllers\AdminBackend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
    public function login(Request $request){
            // Validate input fields
            $request->validate([
                'email' => 'required|email|exists:users,email', // Check if the email exists in the users table
                'password' => 'required|min:6',
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

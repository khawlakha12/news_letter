<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Update; 

class AuthController extends Controller
{
    public function showRegistrationForm(){
        return view('auth/register');
    }
    public function register(Request $request)
    {
        $user = new User();
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->Role = 'user'; 
        
        $user->save();
        return back()->with('success','Registered successfully');
    }
            
            
    public function signin(){
        return view('Auth/signin');
    }
    public function signinPost(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($data)) {           
           return redirect('/admin')->with('success', 'Good job');
        }
    
           return back()->with('error', 'Email or password is not correct');
    }
    public function showDashboard()
    {
        $users = User::all(); 
        $members = Member::all();
        $newsItems = Update::latest()->get(); 
      
        return view('dashboard', compact('users', 'members','newsItems'));
    }
    public function logout(Request $request)
    {
        Auth::logout(); 

        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect('/login'); 
    }
}

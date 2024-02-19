<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User; 
use Illuminate\Support\Facades\Password;
use App\Mail\SimpleEmail;

class forgotPassword extends Controller 
{
    public function forgotPassword()
    {
        return view('forgotPassword');
    }

    public function forgotPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        Mail::to($request->email)->send(new SimpleEmail());
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', ($status))
            : back()->withInput($request->only('email'))->withErrors(['email' => ($status)]);

    

        $token = Str::random(64);

        DB::table('password_resets')->insert([ 
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        $url = route('reset.password', ['token' => $token]);

        Mail::send('emails.forget_password', ['token' => $token, 'url' => $url], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route('forget_password') 
            ->with('success', 'We have sent an email to reset your password.');
    }

    public function resetPassword($token)
    {
        return view('new-password', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    
        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email,
                              'token' => $request->token
                            ])
                            ->first();
    
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
    
        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('success', 'Your password has been changed!');
    }
  }
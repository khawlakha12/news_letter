<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\kKhawlaemail;

class khawlaemail extends Controller
{
    public function sendDivContent(Request $request)
    {
        $htmlContent = $request->input('htmlContent');
        $email = $request->input('email');
       
        
        Mail::to($email)->send(new kKhawlaemail($htmlContent));
        
        return response()->json(['success' => 'Email sent successfully']);
    }
}


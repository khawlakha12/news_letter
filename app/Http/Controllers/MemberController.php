<?php

namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberSelectedMail;
use Illuminate\Http\Request;
use App\Models\Member; 

class MemberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:members,email', 
        ]);

        $member = new Member();
        $member->email = $request->email;
        $member->subscribe = true; 
        $member->save();

        return back()->with('success', 'You have successfully subscribed!');
    }

    public function deleteSelected(Request $request)
    {
        $selectedIds = $request->input('selected_members', []);
        if (!empty($selectedIds)) {
            Member::whereIn('id', $selectedIds)->delete(); 
        }
    
        return back()->with('success', 'Les utilisateurs sélectionnés ont été supprimés.');
    }
    
    public function delete($id)
    {
        $member = Member::findOrFail($id); 
        $member->delete(); 
    
        return back()->with('success', 'Les utilisateurs sélectionnés ont été supprimés.');
    }
    public function sendMail(Request $request)
    {
        $member = Member::findOrFail($request->input('memberId'));

        Mail::to($member->email)->send(new MemberSelectedMail($member));
    
        return back()->with('success', 'Email sent successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class UserController extends Controller
{
    public function changeRole(Request $request)
    {
        $roles = $request->input('roles', []);
        foreach ($roles as $userId => $isAdmin) {
            $user = User::find($userId);
            if ($user) {
                $user->role = $isAdmin ? 'Admin' : 'Editor'; // Mise à jour pour utiliser 'admin' ou 'editor'
                $user->save();
            }
        }
    
        return back()->with('success', 'Les rôles ont été mis à jour.');

    }
    
}

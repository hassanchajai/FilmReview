<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function updateName(){
        $user =User::find(auth()->user()->id);
        $user->name = request()->name;
        $user->save();
        return back();
    }
    public function updatePassword(Request $req){
        $req->validate([
            "newpassword" => "required|min:4|max:101",
            "password" => "required",
        ]);
       
        
        $user = auth()->user();
        $company = User::find($user->id);

        if (!Hash::check($req->password, $user->password)) {
           return back()->with('error', 'Mot de passe incorrect');
        }

        $company->update([
            "password" =>   Hash::make($req->newpassword)

        ]);
        return back()->with('success', 'Mot de passe modifié avec succès');
    }
}

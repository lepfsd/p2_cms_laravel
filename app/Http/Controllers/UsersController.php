<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Users\UpdateProfileRequests;

class UsersController extends Controller
{
    
    public function index() 
    {
        return view('users.index')->with('users', User::all());
    }

    public function makeAdmin(User $user) 
    {
        $user->role = 'admin';
        $user->save();
        session()->flash('success', "user changed role to admin successfully");
        return redirect(route('users.index'));
    }

    public function edit()
    {
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateProfileRequests $request) 
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);

        session()->flash('success', "user updated successfully");

        return redirect()->back();
    }
}

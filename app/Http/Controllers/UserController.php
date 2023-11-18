<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Organization as Org;

class UserController extends Controller
{
    //
    public function index() {
        $users = User::with('getOrg')->with('getRole')->get();

        return view('users.users')->with(compact('users'));
    }

    public function create() {
        $organizations = Org::get()->all();
        return view('users.add-users', compact('organizations'));
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->organization = $request->input('organization');
        $user->role = $request->input('role');
        $user->save();

        return redirect('/users');

    }
}

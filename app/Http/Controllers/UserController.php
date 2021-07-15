<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return $users;
    }


    public function store(Request $request)
    {
        $request->validate([
           'email' => 'required|email|unique:App\User,email',
           'name' => 'required|max:255' 
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return $user;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:App\User,email',
            'name' => 'required|max:255' 
         ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return $user;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if(!empty($user)){
            $user->delete();
        }
        return User::all();
    }

}

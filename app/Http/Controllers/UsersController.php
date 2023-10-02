<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // /////////////(users, update users,delete users, ) //////////


    // get the date from the table users
    public function index()
    {
        $users = User::get()->all();

        return view('admindashboard/pages/users', compact('users'));
    }






    // Add users by use admin dashboard

    public function store(Request $request)
    //    validate the request 
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
        ]);

        // add records to the users table
        User::Create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'title_code' => $request->title_code,
            'register_date' => $request->register_date,
            'role' => $request->role,

        ]);
        return redirect()->route('user.index');

    }
    // Update Users 
    public function edit($id)
    {
        $users = User::find($id);

        return view('admindashboard/pages/updateuser', compact('users'));

    }
    public function update(Request $request,)
    {

        $user = User::find($request->user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();

        return redirect()->route('user.index');
    }
    // delete the user by user admin dashboard
    public function destroy($id)
    {        Vehicle::destroy('user_id',$id);

        User::destroy($id);

        return redirect()->route('user.index');

    }




}
<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Image;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Seller;


use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // get the vehicles information the update on them


    public function index()
    {$admins=Admin::get()->all();

        return view('admindashboard/pages/admins', compact('admins'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Admin::class],
            'password' => ['required'],
        ]);

        // add records to the users table
        Admin::Create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            

        ]);
       

       
        return redirect()->route('admins.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admins = Admin::find($id);

        return view('admindashboard/pages/updateadmin', compact('admins'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Admin::destroy($id);

        return redirect()->route('admins.index');

    }








}
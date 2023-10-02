<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\Payment;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Admin;

class LoginAdmin extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(): View
    {
        return view('admindashboard/pages/loginadmin');
    }
   

    public function store(Request $request): RedirectResponse
    {

        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
           
            session()->flash('success', "Welcome");
            return redirect()->route('adminhome');

        } else {
            session()->flash('error', 'Your Email or password is not correct');
            return redirect()->back();
        }


    }
    public function logout_admin()
    {  Auth::guard('admin')->logout();
        return redirect()->route('loginadmin')->with('success', 'You Have Logout Success');

    }

}
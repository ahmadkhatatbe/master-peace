<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Payment;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Bid;

use App\Models\Watchlist;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function bid(\Illuminate\Http\Request $request)
    {
        try {
            Bid::create([
                'user_id' => $request->user_id,
                'vehicle_id' => $request->vehicle_id,
                'amount' => $request->input('amount'),
                'winstatus' => $request->winstatus,
                'bidtime' => date('Y-m-d H:i:s')

            ]);

            // Redirect back to the previous page or wherever you want
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
             return redirect()->back()->with('error','You have to put for maximum  100 JD') ;
                # code...
             
        }

    }
    public function dashboard()
    {
        $users = User::get()->all();
        $payments = Payment::get()->all();
        $bids = Bid::get()->all();
        $vehicles = Vehicle::get()->all();
        $auctions = Auction::get()->all();
        return view('admindashboard/adminhome', compact('users', 'payments', 'bids', 'vehicles', 'auctions'));

    }

    public function watch(\Illuminate\Http\Request $request)
    {
        try {
            Watchlist::create([
                'user_id' => 1,
                'vehicle_id' => $request->vehicle_id,

            ]);

            // Redirect back to the previous page or wherever you want
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            return "Error: " . $e->getMessage();
        }

    }

    public function home()
    {
        $vehicles = Vehicle::get()->all();
        $bids = Bid::get()->all();

        return view('pages/index', compact('bids', 'vehicles'));

    }

// main Admin data about sellers

    public function seller()
    {
        $users = User::get()->all();
        $payments = Payment::get()->all();
        $bids = Bid::get()->all();

        return view('admindashboard/pages/winners', compact('users', 'payments','bids'));

    }
    // main Admin data about number of sellers and vehicles and auctions
    


    // 
}
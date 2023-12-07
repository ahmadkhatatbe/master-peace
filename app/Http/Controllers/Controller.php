<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\AuctionParticipants;
use App\Models\Image;
use App\Models\Payment;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Bid;
use Illuminate\Http\Request; // Import the 'Request' class here

use App\Models\Watchlist;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Vtiful\Kernel\Format;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // biding from the single page vehicle
    public function bid(\Illuminate\Http\Request $request)
    {
        $payments = Payment::where('user_id', $request->user_id)->first();

        if ($payments==[]|| $payments->expiration_date == now()->format('Y-m-d H:i:s')) {
            return redirect()->back()->with('error', 'You have to reactivate your account');
        }
if($request->input('amount')>100){
            return redirect()->back()->with('error', 'You have to bid  a maximum of 100 JD');

        }
        try {
            Bid::create([
                'user_id' => $request->user_id,
                'vehicle_id' => $request->vehicle_id,
                'amount' => $request->input('amount'),
                'winstatus' => $request->winstatus,
                'bidtime' => now()->format('Y-m-d H:i:s')
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'You have to bid for a maximum of 100 JD');
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
        $vehicles = Vehicle::paginate(4);
                $images = Image::get()->all();

        $bids = Bid::get()->all();

        return view('pages/index', compact('bids', 'vehicles','images'));

    }

   
    // main Admin data about number of sellers and vehicles and auctions

    public function buyer()
    {
        $Vehicles = Vehicle::where('buyer_id',Auth::user()->id)->with('images')->get();
     

        return view('buyer/vehicleshavewon', compact('Vehicles'));

    }
    public function vehicle()
    {
        $Vehicles = Vehicle::whereNull('buyer_id')->with('images')->get();
      
        return view('buyer/addtomybidding', compact('Vehicles'));

    }
    public function winners()
    { 
        $users = User::whereNotNull('winner')->get()->all();
      
        return view('admindashboard/pages/winners', compact('users'));

    }
    public function join(Request $request)
    {
      AuctionParticipants::create([
      'auction_id' => $request->auction_id,
            'user_id' => $request->user_id,
            'vehicle_id' => $request->vehicle_id,


        ]);

        return redirect()->route('vehicles')->with('success','you have been paticipant to the live auction');

    }


public function update_seller(){
return view('seller.updateacount');
}
    public function account_updated(Request $request)
    { 
        User::where('id',Auth::user()->id)->update([
            'contact_phone' => $request->contact_phone,
            'contact_address' => $request->contact_address,
            'role' => $request->role,
            'business_name' => $request->business_name,
           
        ]);
     

        return redirect()->route('home');
    }


    // 
}
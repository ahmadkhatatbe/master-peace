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
use Mockery\Undefined;
use Vtiful\Kernel\Format;

class LiveAuction extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // biding from the single page vehicle
    public function bid(\Illuminate\Http\Request $request)
    {
        // $payments = Payment::where('user_id', $request->user_id)->first();

        // if ($payments == [] || $payments->expiration_date == now()->format('Y-m-d H:i:s')) {
        //     return redirect()->back()->with('error', 'You have to reactivate your account');
        // }
        // if ($request->input('amount') > 100) {
        //     return redirect()->back()->with('error', 'You have to bid  a maximum of 100 JD');

        // }
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

    // live bidding from the live auction page
    public function livebidding(Request $request)
    { 
        // Check if the user's payment is valid
        $payments = Payment::where('user_id', $request->user_id)->first();
        $vehicle = Vehicle::where('id', $request->vehicle_id)->first();
        $target = $vehicle->target;
        $total_bid = (float) $request->sendAmount;

        if ($total_bid >= $target) {
            $buyer = Vehicle::where('id', $request->vehicle_id)->first();
            $buyer->buyer_id = $request->user_id;
            $buyer->price_was_bought = $request->sendAmount;
            $buyer->save();
            $user = User::where('id', $request->user_id)->first();
            $user->winner = 'yes';
            $bidders = Bid::where('vehicle_id', $request->vehicle_id)->get();
            foreach ($bidders as $bidder) {
                $bidder->delete();
            }
            $participants = AuctionParticipants::where('vehicle_id', $request->vehicle_id)->get();
            foreach ($participants as $participant) {
                $participant->delete();
            }

            $stillparticipants = AuctionParticipants::where('user_id', $request->user_id)->get();

            if ($stillparticipants->isNotEmpty()) {
                return response()->json([
                    'success' => true,
                    'route' => 'auction',
                    'vehicle_id' => $stillparticipants[0]->vehicle_id,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'route' => 'home',
                ]);
            }
        } else if ($total_bid <= $target) {
            
          
                // Create a new bid
                Bid::create([
                    'user_id' => $request->user_id,
                    'vehicle_id' => $request->vehicle_id,
                    'amount' => $request->amount,
                    'bidtime' => now()->format('Y-m-d H:i:s'),
                ]);
           
                // Retrieve the latest bid with user information
                

                return response()->json(['bidder','hello']);
          
        }
    }

    public function winner(Request $request)
    { 
        $buyer = Vehicle::where('id', $request->idvehicle)->first();
        $buyer->buyer_id = $request->id;
        $buyer->price_was_bought = $request->price;
        $buyer->save();
        $user = User::where('id', $request->id)->first();
        $user->winner='yes';

        $bidders = Bid::where('vehicle_id', $request->idvehicle)->get();
        foreach ($bidders as $bidder) {
            $bidder->delete();
        }
        $participants = AuctionParticipants::where('vehicle_id', $request->idvehicle)->get();
        foreach ($participants as $participant) {
            $participant->delete();
        }
        $stillparticipants = AuctionParticipants::where('user_id', $request->id)->get();

        if ($stillparticipants->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'route' => 'auction',
                'vehicle_id' => $stillparticipants[0]->vehicle_id,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'route' => 'home',
            ]);
        }
        
       

    }




    // get the last bidder
    public function getlastbidder($vehicleId)
    {

        // Fetch the most recent bid
        $latestBid = Bid::with('user')->latest()->first();
        $totalAmount = Bid::where('vehicle_id', $vehicleId)->sum('amount');

        return response()->json(['latestBid' => $latestBid,'totalAmount'=>$totalAmount]);

    }
    





    public function auction($id)
    {
   
         if (Auth::check()) {

            $vehiclesLive = Vehicle::where('id', $id)->with('images')->get();
         
            $participants = AuctionParticipants::with('user', 'auction', 'vehicles', 'images')
                ->where('user_id', Auth::user()->id)
                ->get();

            $vehicles = []; // Initialize an empty array to store vehicles

            foreach ($participants as $participant) {
                // Access the vehicle_id for each participant and retrieve images
                $vehicleId = $participant->vehicle_id;
                $vehicle = Vehicle::where('id', $vehicleId)->with('images')->get();

                // Append the vehicle to the $vehicles array
                $vehicles[] = $vehicle;
            }
            // Now, $vehicles contains all the vehicles associated with the user's auctions

            return view('pages.auction',compact('participants', 'vehicles','vehiclesLive' ));

        } else {
            return redirect()->route('home')->with('You must to be a member of this mazadi');

        }
        return view('pages.auction');
    }
    
    public function VehiclesParticipants()
    {
        $user_id = Auth::user()->id;

        // Retrieve the auction participants for the current user
        $participants = AuctionParticipants::where('user_id', $user_id)->get();

        // Initialize an empty array to store the vehicles
        $vehicles = [];

        // Loop through the participants and collect the associated vehicles
        foreach ($participants as $participant) {
            $vehicle = Vehicle::where('id', $participant->vehicle_id)->with('images')->get();

            $vehicles[] = $vehicle;



        }

        return response()->json( ['dataVehicles'=>$vehicles]);
    }

    // get data for auction by use ajax
    public function auctiondata()
    {
        if (Auth::check()) {
      
            // $bidding = Bid::with('user')->get();
            $participants = AuctionParticipants::with('user', 'auction', 'vehicles', 'images')
                ->where('user_id', Auth::user()->id)
                ->get();
            foreach ($participants as $participant) {
                // Access the vehicle_id for each participant and retrieve images
                $vehicleId = $participant->vehicle_id;
                $vehicle = Vehicle::where('id', $vehicleId)->get();

                // Append images to the images array
                $vehicles[$vehicleId] = $vehicle;
            }
            return redirect()->route('auction',compact('participants', 'vehicles' ));

        } else {
            return redirect()->route('home')->with('You must to be a member of this mazadi');

        }

    }







    // 
}
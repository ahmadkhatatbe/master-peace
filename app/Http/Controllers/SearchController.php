<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\AuctionParticipants;
use App\Models\Bid;
use App\Models\Image;
use App\Models\Payment;
use App\Models\Vehicle;
use File;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // search for a vehicle 

        if ($request->filled('search')) {

            $vehicles = Vehicle::search($request->search)->get();
            $bids = Bid::get()->all();




        } else {
            $vehicles = Vehicle::get();
        }
        return view('pages/categery', compact('vehicles', 'bids'));
    }

    public function single($id)
    { // go to the single page through this method with array 
        $bids = Bid::where('vehicle_id', $id)->get()->all();
        $info = Vehicle::where('id', $id)->get()->all();
        $auctions = Auction::get()->all();
        $participants = AuctionParticipants::get()->all();
        $payments = Payment::get()->all();
        $vehicles = Vehicle::get()->all();

        $vehicles = Vehicle::get();



        // Retrieve images for each vehicle

        $images = Image::where('vehicle_id', $id)->get();




        return view('Pages.subcategery', compact('info', 'bids', 'auctions', 'participants', 'payments', 'images'));

    }
}
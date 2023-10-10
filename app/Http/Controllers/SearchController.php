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
        // Get the search query from the request
        $searchQuery = $request->input('search');

        // Initialize query builder for vehicles
        $query = Vehicle::query();

        // Check if a search query is provided
        if ($searchQuery) {
            // Split the search query into words
            $keywords = explode(' ', $searchQuery);

            // Loop through the keywords and add conditions to the query
          

            // Use an AND condition between the keyword searches
            $query->where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $q->orWhere(function ($subQuery) use ($keyword) {
                        $subQuery->where('make', 'LIKE', "%$keyword%")
                            ->orWhere('model', 'LIKE', "%$keyword%")
                            ->orWhere('year', 'LIKE', "%$keyword%");
                    });
                }
            });
        }

        // Execute the query to get the results
        $vehicles = $query->get();

        // Get all bids
        $bids = Bid::all();

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
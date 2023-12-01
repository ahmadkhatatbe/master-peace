<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\AuctionParticipants;
use App\Models\Bid;
use App\Models\Image;
use App\Models\Payment;
use App\Models\Vehicle;
use DB;
use File;
use Illuminate\Http\Request;
use Livewire\Features\SupportConsoleCommands\Commands\MakeCommand;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categorypage()
    {

        return view('pages/categery');
    }
    public function index(Request $request)
    {
        $bids = Bid::all();
        $search = $request->input('search');
        $make = $request->input('make');
        $year = $request->input('year');
        $color = $request->input('color');
        $odometer = $request->input('odometer');
        $title = $request->input('title');

        // Search logic
        $query = Vehicle::query()->with('images');

        if ($search) {
            $query->where('make', 'LIKE', "%$search%")
                ->orWhere('year', 'LIKE', "%$search%");
        }

        // Filter logic
        $query->when($make, function ($query, $make) {
            return $query->where('make', $make);
        })
            ->when($year, function ($query, $year) {
                return $query->where('year', $year);
            })
            ->when($color, function ($query, $color) {
                return $query->where('color', $color);
            })
            ->when($odometer, function ($query, $odometer) {
                return $query->where('mileage', '<=', $odometer);
            })
            ->when($title, function ($query, $title) {
            return $query->where('title_code', $title);
        });

        $vehicles = $query->paginate(5); // Adjust the number of records per page as needed


        return view('pages/categery', compact('vehicles', 'bids'));
    }



    public function single($id)
    { // go to the single page through this method with array 
        $bids = Bid::where('vehicle_id', $id)->sum('amount');
        $info = Vehicle::where('id', $id)->with('images')->first();
       
        $auctions = Auction::get()->all();
        $participants = AuctionParticipants::get()->all();
        $payments = Payment::where('user_id',$id)->get()->all();
        $vehicles = Vehicle::where('make', '=', $info->make)->with('images')
    ->get();


       



        // Retrieve images for each vehicle

        $images = Image::where('vehicle_id', $id)->get();




        return view('Pages.subcategery', compact('info', 'bids', 'auctions', 'payments', 'images','vehicles'));

    }
}
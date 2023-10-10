<?php

namespace App\Http\Controllers;

use App\Models\Auction;

use Illuminate\Http\Request;

class AuctionController extends Controller
{
    


    // get the date from the table users
    public function index()
    {
        $auctions = Auction::get()->all();

        return view('admindashboard/pages/auction', compact('auctions'));
    }







    public function store(Request $request)
    {
        Auction::Create([
            'title' => $request->title,
            'description' => $request->description,
            'start_datetime' => $request->startdate,
            'end_datetime' => $request->enddate,

        ]);

      
       return redirect()->route('auction.index');

    }
    // Update Users 
    public function edit($id)
    {
        $auctions = Auction::find($id);

        return view('admindashboard/pages/updateauction', compact('auctions'));

    }
    public function update(Request $request,$id )
    {
        $auction = Auction::find($id);

        $auction->title = $request->title;
        $auction->description = $request->description;
        $auction->start_datetime = $request->startdate;
        $auction->end_datetime = $request->enddate;

        $auction->save();

        return redirect()->route('auction.index');
    }
    // delete the user by user admin dashboard
    public function destroy($id)
    {
        Auction::destroy($id);

       

        return redirect()->route('auction.index');

    }




}
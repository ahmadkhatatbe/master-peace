<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Seller;


use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Str;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // get the vehicles information the update on them


    public function index()
    {
        // Retrieve all vehicles for the authenticated user
        $seller_vehicles = Vehicle::where('user_id', Auth::user()->id)->get();

        // Initialize an empty array to store image data for each vehicle
        $image_vehicles = [];

        // Retrieve images for each vehicle
        foreach ($seller_vehicles as $vehicle) {
            $image = Image::where('vehicle_id', $vehicle->id)->first();

            // Add the image data to the array
            $image_vehicles[] = $image;
        }

        return view('seller.sellervehicles', compact('seller_vehicles', 'image_vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller/addvehicleseller');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $vehicle = Vehicle::Create([
            'make' => $request->make,
            'user_id' => $request->user_id,
            'year' => $request->year,
            'vin' => $request->vin,
            'title_code' => $request->title_code,
            'color' => $request->color,
            'primary_damage' => $request->primary_damage,
            'secondary_damage' => $request->secondary_damage,
            'retail_value' => $request->retail_value,
            'model' => $request->model,
            'mileage' => $request->mileage,
            'current_bid' => $request->current_bid,
            'buy_now_price' => $request->buy_now_price,
            'auction_id' => 1



        ]);
        if ($request->hasFile('images')) {
            $uploadPath = 'uploads/images/';

            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $imageName = time() . Str::random(10) . '.' . $extension;
                $image->move($uploadPath, $imageName);
                $finalImagePathName = $uploadPath . $imageName;

                $imagedata = new Image([
                    'filename' => $finalImagePathName,
                ]);
                $imagedata->vehicle_id = $vehicle->id;
                $imagedata->save();
            }


        }



        return redirect()->route('seller.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if (Auth::user()->role == 'Seller') {


            $seller_vehicle = Vehicle::where('user_id', Auth::user()->id)->get()->all();
            return view('seller/sellervehicles', compact('seller_vehicle'));
        } else {
            return "no cars";
        }





        ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicles = Vehicle::find($id);
        return view('seller/sellerupdatevehicles', compact('vehicles'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vehicles = Vehicle::find($id);
        $vehicles->user_id = $request->user_id;
        $vehicles->make = $request->make;
        $vehicles->year = $request->year;
        $vehicles->vin = $request->vin;
        $vehicles->title_code = $request->title_code;
        $vehicles->color = $request->color;
        $vehicles->primary_damage = $request->primary_damage;
        $vehicles->secondary_damage = $request->secondary_damage;
        $vehicles->retail_value = $request->retail_value;
        $vehicles->model = $request->model;
        $vehicles->mileage = $request->mileage;
        $vehicles->current_bid = $request->current_bid;
        $vehicles->buy_now_price = $request->buy_now_price;

        $vehicles->save();

        return redirect()->route('seller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Vehicle::destroy($id);

        return redirect()->route('seller.index');

    }








}
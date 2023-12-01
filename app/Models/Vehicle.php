<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Vehicle extends Model
{
    use HasFactory,Searchable;
    protected $fillable = [
        'make',
        'user_id',
        'model',
        'year',
        'vin',
        'title_code',
        'color',
        'primary_damage',
        'secondary_damage',
        'retail_value',
        'model',
        'mileage',
        'current_bid',
        'buy_now_price',
        'buyer_id',
        'price_was_bought',
        'target',
        'auction_id',
        // Add other vehicle fields here
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
    public function participants()
    {
        return $this->hasMany(AuctionParticipants::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class); // Replace 'Image' with the actual name of your Image model.
    }
    public function watchlistByUsers()
    {
        return $this->belongsToMany(User::class, 'watchlist', 'vehicle_id', 'user_id');
    }
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'make'=>$this->make,
            'model'=>$this->model,
            'year'=>$this->year,
            'vin'=>$this->vin,
            'title_code'=>$this->code,
            'color'=>$this->color,
            'primary_damage'=>$this->damage,
            'secondary_damage'=>$this->secondary_damage,
            'mileage'=>$this->mileage,
            

        ];
    }
    
}

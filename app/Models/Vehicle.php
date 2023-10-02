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

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function watchlistByUsers()
    {
        return $this->belongsToMany(User::class, 'watchlist', 'vehicle_id', 'user_id');
    }
const SEARCHABLE_FIELDS=['make'];
    public function toSearchableArray()
    {
        return $this->only(self::SEARCHABLE_FIELDS);
    }
    
}

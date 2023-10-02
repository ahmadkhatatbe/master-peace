<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_datetime',
        'end_datetime',

    ];
    public function bid()
    {
        return $this->hasMany(bid::class);
    }
    public function vehicle()
    {
        return $this->hasMany(Vehicle::class,'auction_id','id');
    }
    public function auctionParticipation()
    {
        return $this->belongsToMany(AuctionParticipants::class);
    }
}

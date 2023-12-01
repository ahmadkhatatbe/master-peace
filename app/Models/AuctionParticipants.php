<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionParticipants extends Model
{
    use HasFactory;


    protected $table = 'auction_participants';

    protected $fillable = [
        'user_id',
        'auction_id',
        'vehicle_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }
    public function vehicles()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
    public function images()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;
    protected $table = 'watchlist';

    protected $fillable = [
        'user_id',
        'vehicle_id',
    ];

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'watchlist', 'user_id', 'vehicle_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

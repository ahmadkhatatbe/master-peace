<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type_account'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function watchlist()
    {
        return $this->belongsToMany(Vehicle::class, 'watchlist', 'user_id', 'vehicle_id');
    }

    public function auctionParticipation()
    {
        return $this->belongsToMany(Auction::class, 'auction_participants', 'user_id', 'auction_id', 'vehicle_id');
    }
    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


}

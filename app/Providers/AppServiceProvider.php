<?php

namespace App\Providers;

use App\Models\AuctionParticipants;
use Auth;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
              View::composer('*', function ($view) {
            if(Auth::check()){
            $AuctionParticipantsHeader = AuctionParticipants::where('user_id', Auth::user()->id)->get();
          
                        $view->with(compact('AuctionParticipantsHeader'));
                    }

       
        });

          
    }
    
}

<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuctionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('auctions')->insert([
            'title' => 'Vehicle Clean Title',
            'description' => 'The Best Auction',
            'start_datetime' => '2023-10-15 12:00:00',
            // Replace with your start date and time
            'end_datetime' => '2023-10-20 15:00:00',
            // Replace with your end date and time
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}

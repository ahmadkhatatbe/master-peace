<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->string('vin');
            $table->string('title_code');
            $table->string('color');
            $table->string('primary_damage');
            $table->string('secondary_damage');
            $table->decimal('retail_value');
            $table->integer('mileage');
            $table->decimal('current_bid', 10, 2);
            $table->decimal('buy_now_price');
            
            $table->unsignedBigInteger('auction_id')->default('1');
            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};

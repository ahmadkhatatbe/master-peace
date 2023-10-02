<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('email');
            $table->string('contact_address')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('payment_info')->nullable();
            $table->string('winner')->nullable();

            $table->timestamp('registration_date')->useCurrent();
            $table->enum('role', ['Seller', 'Buyer']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

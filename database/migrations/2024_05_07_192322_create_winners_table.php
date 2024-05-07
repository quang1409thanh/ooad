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
        Schema::create('winners', function (Blueprint $table) {
            $table->id('winner_id');
            $table->foreignId('product_id')->constrained('products','product_id');
            $table->foreignId('customer_id')->constrained('customers','customer_id');
            $table->string('winners_image', 100);
            $table->float('winning_bid', 10);
            $table->date('end_date');
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winners');
    }
};

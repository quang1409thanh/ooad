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
        Schema::create('biddings', function (Blueprint $table) {
            $table->id('bidding_id');
            $table->foreignId('customer_id')->constrained('customers','customer_id');
            $table->foreignId('product_id')->constrained('products','product_id');
            $table->float('bidding_amount', 10);
            $table->dateTime('bidding_date_time');
            $table->text('note');
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biddings');
    }
};

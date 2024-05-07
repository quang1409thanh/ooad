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
        Schema::create('bidding', function (Blueprint $table) {
            $table->integer('bidding_id', true);
            $table->integer('customer_id');
            $table->integer('product_id');
            $table->float('bidding_amount', 10);
            $table->dateTime('bidding_date_time');
            $table->text('note');
            $table->string('status', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidding');
    }
};

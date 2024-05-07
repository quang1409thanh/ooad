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
        Schema::create('payment', function (Blueprint $table) {
            $table->integer('payment_id', true);
            $table->integer('customer_id');
            $table->string('payment_type', 50);
            $table->integer('product_id');
            $table->integer('bidding_id');
            $table->float('paid_amount', 10);
            $table->date('paid_date');
            $table->string('status', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};

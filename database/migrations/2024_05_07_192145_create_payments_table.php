<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->foreignId('customer_id')->constrained('customers','customer_id');
            $table->string('payment_type', 50);
            $table->foreignId('product_id')->constrained('products','product_id');
            $table->foreignId('bidding_id')->nullable()->constrained('biddings','bidding_id');
            $table->float('paid_amount', 10);
            $table->date('paid_date');
            $table->string('status', 10);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

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
        Schema::create('billing', function (Blueprint $table) {
            $table->integer('billing_id', true);
            $table->integer('customer_id');
            $table->integer('product_id');
            $table->date('purchase_date');
            $table->float('purchase_amount', 10);
            $table->string('payment_type', 20);
            $table->string('card_type', 50);
            $table->string('card_number', 20);
            $table->date('expire_date');
            $table->string('cvv_number', 5);
            $table->string('card_holder', 50);
            $table->date('delivery_date');
            $table->text('note');
            $table->string('status', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing');
    }
};

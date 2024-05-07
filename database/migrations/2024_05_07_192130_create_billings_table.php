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
        Schema::create('billings', function (Blueprint $table) {
            $table->id('billing_id');
            $table->foreignId('customer_id')->constrained('customers', 'customer_id');
            $table->foreignId('product_id')->constrained('products', 'product_id');
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};

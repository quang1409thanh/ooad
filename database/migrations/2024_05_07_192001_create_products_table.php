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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->foreignId('customer_id')->constrained('customers','customer_id');
            $table->string('product_name', 50);
            $table->foreignId('category_id')->constrained('categories','category_id');
            $table->text('product_description');
            $table->float('starting_bid', 10);
            $table->float('ending_bid', 10);
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->float('product_cost', 10);
            $table->text('product_image');
            $table->string('product_warranty', 100);
            $table->text('product_delivery');
            $table->string('company_name', 100);
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

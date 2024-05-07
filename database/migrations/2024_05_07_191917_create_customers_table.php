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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('customer_name', 50);
            $table->string('email_id', 50)->unique();
            $table->string('password', 100);
            $table->text('address')->nullable();
            $table->string('state', 25)->nullable();
            $table->string('city', 25)->nullable();
            $table->string('landmark', 50)->nullable();
            $table->string('pincode', 6)->nullable();
            $table->string('mobile_no', 15)->nullable();
            $table->text('note')->nullable();
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

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
        Schema::create('customer', function (Blueprint $table) {
            $table->integer('customer_id', true);
            $table->string('customer_name', 50);
            $table->string('email_id', 50);
            $table->string('password', 100);
            $table->text('address');
            $table->string('state', 25);
            $table->string('city', 25);
            $table->string('landmark', 50);
            $table->string('pincode', 6);
            $table->string('mobile_no', 15);
            $table->text('note');
            $table->string('status', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};

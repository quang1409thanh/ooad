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
        Schema::create('blockchain', function (Blueprint $table) {
            $table->text('timestamp')->default('CURRENT_TIMESTAMP');
            $table->text('data');
            $table->text('previousHash');
            $table->text('hash');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blockchain');
    }
};

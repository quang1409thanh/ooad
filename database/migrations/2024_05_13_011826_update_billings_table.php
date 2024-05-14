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
        //
        Schema::table('billings', function (Blueprint $table) {
            // Xóa ràng buộc khóa ngoại trước khi xóa cột
            $table->dropForeign(['product_id']);

            // Xóa cột product_id
            $table->dropColumn('product_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

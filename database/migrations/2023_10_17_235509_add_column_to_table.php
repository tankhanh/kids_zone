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
        Schema::table('lessons', function (Blueprint $table) {
            // Thêm cột memPackage_id
            $table->unsignedBigInteger('memPackage_id')->nullable();

            // Tạo ràng buộc khóa ngoại
            $table->foreign('memPackage_id')->references('id')->on('membership_packages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('lessons', function (Blueprint $table) {
        // Hủy ràng buộc khóa ngoại
        $table->dropForeign(['memPackage_id']);

        // Xóa cột memPackage_id
        $table->dropColumn('memPackage_id');
    });
}
};
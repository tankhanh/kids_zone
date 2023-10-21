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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->integer('age');
            $table->unsignedBigInteger('category_id')->default(0)->comment('0: Root');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('mainImage');
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('membership_packages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
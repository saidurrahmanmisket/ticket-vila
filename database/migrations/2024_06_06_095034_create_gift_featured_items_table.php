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
        Schema::create('gift_featured_items', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_de')->nullable();
            $table->string('title_hu')->nullable();
            $table->string('sub_title_en')->nullable();
            $table->string('sub_title_de')->nullable();
            $table->string('sub_title_hu')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('gift_id');
            $table->foreign('gift_id')->references('id')->on('gifts')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_featured_items');
    }
};

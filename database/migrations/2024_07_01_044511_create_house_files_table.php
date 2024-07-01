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
        Schema::create('house_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gift_id');
            $table->foreign('gift_id')->references('id')->on('gifts')->onDelete('cascade');
            $table->string('file_name_en');
            $table->string('file_name_de');
            $table->string('file_name_hu');
            $table->string('file_path');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_files');
    }
};

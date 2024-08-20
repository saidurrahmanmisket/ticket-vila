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
        Schema::create('affiliate_files', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_de');
            $table->string('title_hu');
            $table->text('file');
            $table->text('icon');
            $table->enum('file_type', ['image', 'video', 'text'])->default('image');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_files');
    }
};

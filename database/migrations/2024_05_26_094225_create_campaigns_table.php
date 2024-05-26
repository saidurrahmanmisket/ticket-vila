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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('max_limit')->default(0);
            $table->string('unique_text')->unique();
            $table->foreignId('ebook_id')->nullable()->constrained('ebooks')->nullOnDelete();
            $table->foreignId('gift_id')->nullable()->constrained('gifts')->nullOnDelete();
            $table->enum('status',['draft','published'])->default('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};

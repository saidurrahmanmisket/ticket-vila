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
            $table->enum('target_type',[2,3])->comment('2=date,3=campaign limit');
            $table->integer('limit')->nullable()->default(0);
            $table->dateTime('end_time')->nullable()->default(null);
            $table->string('unique_text')->unique();
            $table->string('thumbnail')->nullable();
            $table->double('price')->nullable();
            $table->string('ebook')->nullable();
            $table->integer('purchase_limit')->nullable();
            $table->foreignId('gift_id')->nullable()->constrained('gifts')->nullOnDelete();
            $table->enum('status',['draft','published','complete'])->default('published');
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

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
            $table->string('name_en');
            $table->string('name_de');
            $table->string('name_hu');
            $table->enum('target_type', [2, 3])->default(3)->comment('2=date,3=limit');
            $table->integer('limit')->default(0);
            $table->dateTime('end_date_time')->nullable();
            $table->string('unique_text');
            $table->string('thumbnail')->nullable();
            $table->double('price');
            $table->float('discount_percent')->nullable();
            $table->dateTime('discount_expire_date')->nullable();
            $table->integer('how_many_buy')->nullable();
            $table->integer('how_many_free')->nullable();
            $table->string('promotion_banner_en')->nullable();
            $table->string('promotion_banner_de')->nullable();
            $table->string('promotion_banner_hu')->nullable();
            $table->string('mobile_promotion_banner_de')->nullable();
            $table->string('mobile_promotion_banner_en')->nullable();
            $table->string('mobile_promotion_banner_hu')->nullable();
            $table->foreignId('gift_id')->nullable()->constrained('gifts')->nullOnDelete();
            $table->enum('status', ['draft', 'published', 'completed'])->default('published');
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

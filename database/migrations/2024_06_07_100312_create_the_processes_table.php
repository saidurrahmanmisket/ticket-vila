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
        Schema::create('the_processes', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_de')->nullable();
            $table->string('title_hu')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_de')->nullable();
            $table->text('description_hu')->nullable();
            $table->string('image')->nullable();
            $table->string('video_url_en')->nullable();
            $table->string('video_url_de')->nullable();
            $table->string('video_url_hu')->nullable();
            $table->string('icon')->nullable();
            $table->string('icon_top_text_en')->nullable();
            $table->string('icon_top_text_de')->nullable();
            $table->string('icon_top_text_hu')->nullable();
            $table->string('icon_bottom_text_en')->nullable();
            $table->string('icon_bottom_text_de')->nullable();
            $table->string('icon_bottom_text_hu')->nullable();
            $table->string('sort_id')->default(0);
            $table->enum('button_type',['buy_now','learn_more','both','none'])->default('buy_now');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('the_processes');
    }
};

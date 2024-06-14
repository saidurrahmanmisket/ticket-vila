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
        Schema::create('c_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable();
            $table->string('section_name')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_de')->nullable();
            $table->string('title_hu')->nullable();
            $table->string('sub_title_en')->nullable();
            $table->string('sub_title_de')->nullable();
            $table->string('sub_title_hu')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_de')->nullable();
            $table->longText('description_hu')->nullable();
            $table->text('link')->nullable();
            $table->text('link_en')->nullable();
            $table->text('link_de')->nullable();
            $table->text('link_hu')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_m_s');
    }
};

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
        Schema::table('campaigns', function (Blueprint $table) {
            // Add new column
            $table->string('promotion_banner_de')->nullable();
            $table->string('promotion_banner_hu')->nullable();
            $table->string('mobile_promotion_banner_de')->nullable();
            $table->string('mobile_promotion_banner_en')->nullable();
            $table->string('mobile_promotion_banner_hu')->nullable();
            // Rename the 'promotion_banner' column to 'promotion_banner_en'
            $table->renameColumn('promotion_banner', 'promotion_banner_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropColumn('promotion_banner_de');
            $table->dropColumn('promotion_banner_hu');
            $table->dropColumn('mobile_promotion_banner_de');
            $table->dropColumn('mobile_promotion_banner_en');
            $table->dropColumn('mobile_promotion_banner_hu');
            $table->renameColumn('promotion_banner_en', 'promotion_banner');
        });
    }
};

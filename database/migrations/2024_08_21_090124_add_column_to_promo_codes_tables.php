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
        Schema::table('promo_codes', function (Blueprint $table) {
            $table->integer('min_quantity')->default(0)->after('times_used');
            $table->integer('max_quantity')->default(0)->after('min_quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promo_codes_tables', function (Blueprint $table) {
            $table->dropColumn('min_quantity');
            $table->dropColumn('max_quantity');
        });
    }
};

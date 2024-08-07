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
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('discount_amount', 8, 2)->after('discount_percent')->nullable();
            $table->integer('promo_discount_percent')->after('discount_amount')->nullable();
            $table->decimal('promo_discount_amount', 8, 2)->after('promo_discount_percent')->nullable();
            $table->string('promo_discount_code')->after('promo_discount_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('discount_amount');
            $table->dropColumn('promo_discount_percent');
            $table->dropColumn('promo_discount_amount');
            $table->dropColumn('promo_discount_code');
        });
    }
};

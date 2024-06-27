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
        Schema::table('key_features', function (Blueprint $table) {
            // Add the link column after the icon column
            $table->string('link')->nullable()->after('icon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('key_features', function (Blueprint $table) {
            // Drop the link column
            $table->dropColumn('link');
        });
    }
};

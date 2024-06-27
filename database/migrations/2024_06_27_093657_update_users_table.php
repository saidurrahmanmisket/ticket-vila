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
        Schema::table('users', function (Blueprint $table) {
            // Rename the state_of_birthday column to city_of_birthday
            $table->renameColumn('state_of_birthday', 'city_of_birthday');

            // Add new columns country_of_birthday and phone
            $table->string('country_of_birthday')->nullable()->after('birthday');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert the column name change
            $table->renameColumn('city_of_birthday', 'state_of_birthday');

            // Drop the new columns
            $table->dropColumn(['country_of_birthday']);
        });
    }
};

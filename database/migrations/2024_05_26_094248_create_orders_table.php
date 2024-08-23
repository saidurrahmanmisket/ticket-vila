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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('transaction_id');
            $table->integer('quantity')->default(0);
            $table->integer('discount_quantity')->default(0);
            $table->integer('discount_percent')->default(0);
            $table->double('total_price')->default(0);
            $table->string('payment_method')->nullable();
            $table->string('invoice_no')->nullable();
            $table->foreignId('campaign_id')->constrained('campaigns');
            $table->decimal('discount_amount', 8, 2)->after('discount_percent')->nullable();
            $table->integer('promo_discount_percent')->after('discount_amount')->nullable();
            $table->decimal('promo_discount_amount', 8, 2)->after('promo_discount_percent')->nullable();
            $table->string('promo_discount_code')->after('promo_discount_amount')->nullable();
            $table->enum('payment_status', ['pending', 'processing', 'completed', 'refund'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

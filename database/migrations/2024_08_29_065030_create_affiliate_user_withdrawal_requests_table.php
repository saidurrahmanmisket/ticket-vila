<?php

use App\Enums\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('affiliate_user_withdrawal_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affiliate_user_id')->constrained('affiliate_users')->onDelete('cascade');
            $table->string('account_holder_name');
            $table->string('bank_account_number');
            $table->string('bank_name');
            $table->string('bank_branch_name')->nullable();
            $table->string('bank_routing_number')->nullable();
            $table->string('swift_bic_code')->nullable();
            $table->string('country_of_bank');
            $table->decimal('amount', 10, 2);
            $table->enum('status', [Status::PENDING, Status::APPROVED, Status::REJECTED])->default(Status::PENDING);
            $table->timestamp('requested_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('affiliate_user_withdrawal_requests');
    }
};

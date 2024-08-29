<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateUserWithdrawalRequest extends Model
{
    use HasFactory;

    protected $table = 'affiliate_user_withdrawal_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'affiliate_user_id',
        'account_holder_name',
        'bank_account_number',
        'bank_name',
        'bank_branch_name',
        'bank_routing_number',
        'swift_bic_code',
        'country_of_bank',
        'amount',
        'status',
        'requested_at',
    ];

    protected $casts = [
        'requested_at' => 'datetime',
    ];
    /**
     * Get the affiliate user associated with the withdrawal request.
     */
    public function affiliateUser()
    {
        return $this->belongsTo(AffiliateUser::class);
    }
}

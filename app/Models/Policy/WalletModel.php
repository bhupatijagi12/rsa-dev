<?php

namespace App\Models\Policy;

use CodeIgniter\Model;

class WalletModel extends Model
{
    protected $table = 'wallet_transaction';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'amount',
        'dealer_id',
        'amount',
        'transaction_no',
        'file_upload',
        'transaction_type',
        'status',
        'remarks',
        'updated_by',
        'updated_date',
        'wallet_category'

    ];

    public function getWalletBalance($dealerId)
    {
        $credit = $this->where('dealer_id', $dealerId)
            ->where('status', 'Approved')
            ->where('transaction_type', 'credit')
            ->selectSum('amount')
            ->first();

        $debit = $this->where('dealer_id', $dealerId)
            ->where('transaction_type', 'debit')
            ->selectSum('amount')
            ->first();

         $creditAmount = (float) ($credit['amount'] ?? 0);
         $debitAmount  = (float) ($debit['amount'] ?? 0);
         return round(max(0, $creditAmount - $debitAmount), 2);
    }

    public function updateWalletTransaction($dealerId, $premiumAmount, $policyId, $policyNo)
    {
        $this->insert([
                'amount' => $premiumAmount,
                'transaction_type' => 'credit',
                'remarks' => 'Amount credited due to cancellation of policy no :- '.$policyNo,
                'status' => 'Approved',
                'dealer_id' => $dealerId,
                'login_type' => session('user_type'),
                'wallet_category' => 2
             ]);
    }
}
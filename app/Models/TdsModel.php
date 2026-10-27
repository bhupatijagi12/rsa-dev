<?php

namespace App\Models;

use CodeIgniter\Model;

class TdsModel extends Model
{
	protected $table = 'tds_calculation';
    protected $primaryKey = 'id';

     protected $allowedFields = [
        'dealer_id',
        'tds_amount',
        'gst_amount',
        'plan_premium_exc_gst',
        'premium_ex_gst',
        'commission_amount'
        ];

     public function getCommissionAmount($dealerId)
    {
        $credit = $this->where('dealer_id', $dealerId)
            //->where('status', 'Approved')
            //->where('transaction_type', 'credit')
            ->selectSum('commission_amount')
            ->first();

         

        $creditAmount = (float) ($credit['commission_amount'] ?? 0);
         return max(0, round($creditAmount,2));
    }

 }
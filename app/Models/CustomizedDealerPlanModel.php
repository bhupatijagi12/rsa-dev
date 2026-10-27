<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomizedDealerPlanModel extends Model
{
    protected $table = 'customized_dealer_plan';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'product_code',
        'product_name',
        'status',
        'dealer_id',
        'plan_amount',
        'login_type',
        'updated_by'

    ];

      public function getPlanDetails($planId)
    {
            return $this->where('id', $planId)
            ->first();
    }
}
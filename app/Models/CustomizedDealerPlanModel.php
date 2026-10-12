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
        'dealer_id'

    ];
}
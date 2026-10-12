<?php
namespace App\Models;

use CodeIgniter\Model;

class GAAProductPlanModel extends Model
{
    protected $table = 'gaa_product_plans';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'product_code',
        'product_name',
        'coverage',
        'vehicle_type',
        'premium_ex_gst',
        'gst_percentage',
        'gst_amount',
        'premium_inc_gst',
        'description',
        'plan_category',
        'status'
    ];
}

?>
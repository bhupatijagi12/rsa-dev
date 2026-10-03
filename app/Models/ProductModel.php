<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'rsa_products';

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
        'status'
    ];
}

?>
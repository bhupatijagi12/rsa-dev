<?php
namespace App\Models;

use CodeIgniter\Model;

class GAAProductsModel extends Model
{
    protected $table = 'gaa_products';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'product_name',
        'login_type',
        'active'
    ];
}

?>
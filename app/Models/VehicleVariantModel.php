<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleVariantModel extends Model
{
	 protected $table = 'vehicle_variants';

    protected $primaryKey = 'id';

    protected $allowedFields = [
    	'model_id',
    	'variant_name',
    	'fuel_type',
        'transmission',
        'ex_showroom_price',
        'status'
    ];
}

?>
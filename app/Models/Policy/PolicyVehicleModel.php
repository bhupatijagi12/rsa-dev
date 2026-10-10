<?php

namespace App\Models;

use CodeIgniter\Model;

class PolicyVehicleModel extends Model
{
	protected $table = 'policy_vehicle_details';
    protected $primaryKey = 'id';

     protected $allowedFields = [
        'policy_id',
        'engine_no',
        'engine_no',
        'variant_id',
        'vehicle_type'
    ];
}
?>
<?php

namespace App\Models\Policy;

use CodeIgniter\Model;

class PolicyVehicleModel extends Model
{
	protected $table = 'policy_vehicle_details';
    protected $primaryKey = 'id';

     protected $allowedFields = [
        'policy_id',
        'engine_no',
        'chassis_no',
        'variant_id',
        'vehicle_type'
    ];
}
?>
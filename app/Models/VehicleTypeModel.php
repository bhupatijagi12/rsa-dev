<?php

namespace App\Models\Policy;

use CodeIgniter\Model;

class VehicleTypeModel extends Model
{


protected $table = 'gaa_vehicle_types';
protected $primaryKey = 'id';

protected $allowedFields = [
    'product_name',
    'product_code',
    'status'
];

protected $useTimestamps = true;
}

?>
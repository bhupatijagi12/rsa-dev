<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleModelModel extends Model
{
	 protected $table = 'vehicle_models';

    protected $primaryKey = 'id';

    protected $allowedFields = [
    	'make_id',
    	'model_name',
    	'status'
    ];
}

?>
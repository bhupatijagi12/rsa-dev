<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleMakeModel extends Model
{
	 protected $table = 'vehicle_makes';

    protected $primaryKey = 'id';

    protected $allowedFields = [
    	'vehicle_type',
    	'make_name',
    	'status'
    ];
}

?>
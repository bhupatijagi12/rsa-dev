<?php

namespace App\Models;

use CodeIgniter\Model;

class PolicyModel extends Model
{
	protected $table = 'policy_detail';
    protected $primaryKey = 'id';

     protected $allowedFields = [
        'policy_no',
        'login_type_id',
        'status'
    ];
}
?>
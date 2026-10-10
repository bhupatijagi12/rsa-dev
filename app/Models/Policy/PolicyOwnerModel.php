<?php

namespace App\Models;

use CodeIgniter\Model;

class PolicyOwnerModel extends Model
{
	protected $table = 'policy_owner_details';
    protected $primaryKey = 'id';

     protected $allowedFields = [
        'policy_id',
        'firstname',
        'middlename',
        'lastname',
        'gender',
        'email',
        'mobile',
        'address',
        'state',
        'city',
        'pincode',
        'dob',
        'occupation',
        'emergency_contact'

    ];
}
?>
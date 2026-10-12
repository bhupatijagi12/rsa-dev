<?php

namespace App\Models\Policy;

use CodeIgniter\Model;

class PolicyNomineeModel extends Model
{
	protected $table = 'policy_nominee_details';
    protected $primaryKey = 'id';

     protected $allowedFields = [
        'policy_id',
        'nominee_firstname',
        'nominee_middlename',
        'nominee_lastname',
        'nominee_gender',
        'nominee_dob',
        'nominee_mobile',
        'relationship'
    ];
}
?>
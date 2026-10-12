<?php

namespace App\Models\Policy;

use CodeIgniter\Model;

class PolicyModel extends Model
{
	protected $table = 'policy_detail';
    protected $primaryKey = 'id';

     protected $allowedFields = [
        'policy_no',
        'login_type_id',
        'login_id',
        'status',
        'plan_category',
        'plan_name',
        'premium_payable',
        'gst',
        'premium_ex_gst',
        'certificate_start_date',
        'certificate_end_date',
        'limited_amount'
        ];

   public function getPolicy($policyId)
   {
      return $this->db->table('policy_detail pd')
    ->select('pd.*, pvd.*, pod.*, pnd.*')
    ->join('policy_vehicle_details pvd', 'pvd.policy_id = pd.id', 'left')
    ->join('policy_owner_details pod', 'pod.policy_id = pd.id', 'left')
    ->join('policy_nominee_details pnd', 'pnd.policy_id = pd.id', 'left')
    ->where('pd.id', $policyId)
    ->get()
    ->getRowArray();
    
   }
}
?>
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
        'limited_amount',
        'certificate_status'
        ];

   public function getPolicy($policyId)
   {
      return $this->db->table('policy_detail pd')
    ->select('pd.*, pd.id as policy_id, pvd.*, pod.*, pnd.*')
    ->join('policy_vehicle_details pvd', 'pvd.policy_id = pd.id', 'left')
    ->join('policy_owner_details pod', 'pod.policy_id = pd.id', 'left')
    ->join('policy_nominee_details pnd', 'pnd.policy_id = pd.id', 'left')
    ->where('pd.id', $policyId)
    ->get()
    ->getRowArray();
    
   }


   public function getPolicyDetails($certificate_no)
   {
      return $this->db->table('policy_detail pd')
    ->select('pd.*, pd.id as policy_id, pvd.*, pod.*, pnd.*, vm.make_name,
    vmo.model_name,
    vv.variant_name,
    cs.status_name')
    ->join('policy_vehicle_details pvd', 'pvd.policy_id = pd.id', 'left')
    ->join('policy_owner_details pod', 'pod.policy_id = pd.id', 'left')
    ->join('policy_nominee_details pnd', 'pnd.policy_id = pd.id', 'left')
    ->join('vehicle_makes vm', 'pvd.make_id = vm.id', 'left')
    ->join('vehicle_models vmo', 'pvd.model_id = vmo.id', 'left')
    ->join('vehicle_variants vv', 'pvd.variant_id = vv.id', 'left')
    ->join('certificate_status cs', 'pd.status = cs.id', 'left')
    //->where('pd.policy_no', $certificate_no)
    ->where('pd.id', $certificate_no)
    ->where('pd.certificate_status', 'Active')
    ->get()
    ->getRowArray();

    //echo $this->db->getLastQuery();
   }

   public function getPolicyDetailsByCert($certificate_no)
   {
      return $this->db->table('policy_detail pd')
    ->select('pd.*, pd.id as policy_id, pvd.*, pod.*, pnd.*, vm.make_name,
    vmo.model_name,
    vv.variant_name,
    cs.status_name')
    ->join('policy_vehicle_details pvd', 'pvd.policy_id = pd.id', 'left')
    ->join('policy_owner_details pod', 'pod.policy_id = pd.id', 'left')
    ->join('policy_nominee_details pnd', 'pnd.policy_id = pd.id', 'left')
    ->join('vehicle_makes vm', 'pvd.make_id = vm.id', 'left')
    ->join('vehicle_models vmo', 'pvd.model_id = vmo.id', 'left')
    ->join('vehicle_variants vv', 'pvd.variant_id = vv.id', 'left')
    ->join('certificate_status cs', 'pd.status = cs.id', 'left')
    ->where('pd.policy_no', $certificate_no)
    ->where('pd.certificate_status', 'Active')
    ->get()
    ->getRowArray();

    //echo $this->db->getLastQuery();
   }



  public function sendCOIApi(array $payload)
{
   
    $url = 'https://novelembedd.hyperx.cloud/api/getcoidata';

    $options = [
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/json\r\nAccept: application/json\r\n",
            'content' => json_encode($payload),
            'ignore_errors' => true
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    return json_decode($response, true);
}

   
}
?>
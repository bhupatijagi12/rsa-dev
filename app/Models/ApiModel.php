<?php
namespace App\Models;

use App\Models\CustomizedDealerPlanModel;
use App\Models\GAAProductPlanModel;
use App\Models\Policy\PolicyModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\DealerModel;

use CodeIgniter\Model;
class ApiModel extends Model
{
    protected $table = 'api_payload';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'dealer_id',
        'policy_id',
        'rsa_number',
        'request',
        'response'
    ];


    public function getApiCall($planCategory, $planName, $policyId)
    {
    	$errorArray = array();
    	$customizedDealerPlanModel = new \App\Models\CustomizedDealerPlanModel();
    	$gAAProductPlanModel = new \App\Models\GAAProductPlanModel();
    	$planDetails = $customizedDealerPlanModel->where('id', $planName)->first();
    	$productName = $planDetails['product_name'];
    	$explodes = explode("+", $productName);
    	foreach ($explodes as $plancode)
    	{
    		$gAAProductDetails = $gAAProductPlanModel->where('master_product_code', $plancode)->first();
    		$result = $this->getApiCallFunc($policyId, $gAAProductDetails['sum_insured'], $gAAProductDetails['master_policy_no']);
    		if (empty($result['success']) && !empty($result['results']['failed']))
			{
			    foreach ($result['results']['failed'] as $failed)
			    {
			        $errorArray[] = $failed['subscriber_rsa_number'] . ' : ' . $failed['error'];
			    }
			}
    	}

    	return $errorArray;

    }	

    private function getApiCallFunc($policyId, $sumImsured, $masterPolicyNo)
    {
    	$policyModel = new \App\Models\Policy\PolicyModel();
    	$cityModel = new \App\Models\CityModel();
		$stateModel = new \App\Models\StateModel();
		$dealerModel = new \App\Models\DealerModel();
    	$policyDetails = $policyModel->getPolicyDetails($policyId);
    	$stateCityDetails = $cityModel->getCityDetails($policyDetails['city']);
    	$dealerDetails = $dealerModel->where('id', $policyDetails['login_id'])->first();

    	$this->insert([
			'dealer_id' => session('dealer_id'),
			'policy_id' => $policyDetails['id']
		]);
    	$insertId = $this->getInsertID();
    	
    	$rsaNumber = 'RSA-' . date('Y') . '-' . str_pad($insertId, 5, '0', STR_PAD_LEFT);
		$payload = [
   			 'certificates' => [
	        [
	            'title' => '',
	            'member_relationship' => '',
	            'master_policy_number' => $masterPolicyNo,
	            'transaction_date' => date('Y-m-d'),
	            'transaction_number' => 'TXN' . time(),
	            'ghi_sum_insured' => $sumImsured,
	            'state' => $stateCityDetails['state_name'],
	            'good_health_declaration' => 'Y',
	            'subscriber_number' => 'SUB'. $insertId,
	            'subscription_start_date' => $policyDetails['certificate_start_date'],
	            'tenure' => '1 Year',
	            'subscriber_rsa_number' => $rsaNumber,
	            'subscriber_first_name' => $policyDetails['firstname'],
	            'subscriber_middle_name' => $policyDetails['middlename'],
	            'subscriber_last_name' => $policyDetails['lastname'],
	            'subscriber_gender' => $policyDetails['gender'],
	            'subscriber_age' => "",
	            'subscriber_dob' => $policyDetails['dob'],
	            'insured_address'=> $policyDetails['address'],
			      'city'=> $stateCityDetails['city_name'],
			      'subscriber_state'=>  $stateCityDetails['state_name'],
			      'pin_code'=>  $policyDetails['pincode'],
			      'insured_mobile'=>  $policyDetails['mobile'],
			      'occupation'=>  $policyDetails['occupation'],
			      'nominee_first_name'=>  $policyDetails['nominee_firstname'],
			      'nominee_middle_name'=>  $policyDetails['nominee_middlename'],
			      'nominee_last_name'=>  $policyDetails['nominee_lastname'],
			      'nominee_gender'=>  $policyDetails['nominee_gender'],
			      'nominee_age'=>  $policyDetails['nominee_dob'],
			      'nominee_dob'=>  '',
			      'nominee_mobile'=>  $policyDetails['nominee_mobile'],
			      'nominee_relationship'=>  $policyDetails['relationship'],
			      'dealer_code'=>  $dealerDetails['dealer_code'],
			      'package_name'=>  "RSA",
			      'cargo_value'=>  $policyDetails['premium_payable']

	        ]
    ]
];
		$result = $policyModel->sendCOIApi($payload);

		$this->update($insertId, [
			'rsa_number' => $rsaNumber,
			'response' => json_encode($result),
			'request' => json_encode($payload)
		]);

		return $result;
    }
}

?>
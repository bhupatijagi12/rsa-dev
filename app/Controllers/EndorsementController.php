<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\VehicleModel;

use App\Models\vehicleMakeModel;
use App\Models\vehicleModelModel;
use App\Models\vehicleVariantModel;

use App\Models\StateModel;
use App\Models\Policy\PolicyModel;
use App\Models\Policy\PolicyOwnerModel;
use App\Models\Policy\PolicyVehicleModel;
use App\Models\Policy\PolicyNomineeModel;
use App\Models\GAAProductsModel;
use App\Models\GAAProductPlanModel;
use App\Models\CustomizedDealerPlanModel;
use App\Models\DealerModel;
use App\Models\Policy\WalletModel;
use App\Models\TdsModel;
use App\Models\CityModel;
use App\Models\Misreport\OpsHistoryModel;
use App\Libraries\Mailer;
use App\Models\CancelEndorseModel;




use Dompdf\Dompdf;
use Dompdf\Options;

class EndorsementController extends BaseController
{
	public function newendorsement() 
	{
		return view('operations/new-endorsement');
	}

	public function viewendorsement()
	{
		$policyModel = new \App\Models\Policy\PolicyModel();
		$certificate_no = $this->request->getPost('certificate_no');
		$policyDetails = $policyModel->getPolicyDetailsByCert($certificate_no);
		//echo '<pre>'; print_r($data); die	`;
		if ($policyDetails =="")
		{
			return redirect()->back()->with('error', 'No Certificate found. Please try with different certificate number.');
		}
		return view('operations/view-endorsement', $policyDetails);
	}

	public function endorsecertificate()
	{
		//print_r($_GET); die;
		$relationshipModel = new \App\Models\RelationshipModel();
		$policyModel = new \App\Models\Policy\PolicyModel();
		$cityModel = new \App\Models\CityModel();
		$stateModel = new \App\Models\StateModel();
		$postData = session()->getFlashdata('postData');
		if ($postData)
		{
			$endorse_policy_id = $postData['endorse_policy_id'];
		} else {
		    $endorse_policy_id = $this->request->getGet('endorse_policy_id');
		}
		
		
		$data['states'] = $stateModel->where('status', 1)
					->findAll();
		$data['relations'] = $relationshipModel->where('status', 1)->findAll();
		$data['details'] = $policyModel->getPolicy($endorse_policy_id);
		//echo '<pre>';print_r($data); die;
		$cityId = $data['details']['city'];
		$cityDetails = $cityModel->where('id', $cityId)->first();
		$data['cityName'] = $cityDetails['city_name'];
		//echo '<pre>';
		//print_r($data); die;
		$data['endorse_policy_id'] = $endorse_policy_id;
		return view('operations/endorsement-plan', $data);
	} 

	public function updateendorsement()
	{
		$post = $this->request->getPost();
        $endorse_policy_id = $this->request->getPost('endorse_policy_id');
			$newFields = array_filter(
			    $post,
			    function ($key) {
			        return strpos($key, 'new_') === 0;
			    },
			    ARRAY_FILTER_USE_KEY
			);

			$hasValue = false;

			foreach ($newFields as $value) {
			    if (trim((string)$value) !== '') {
			        $hasValue = true;
			        break;
			    }
			}

			if (!$hasValue) {
			    return redirect('ops/endorsecertificate')->back()->with('postData',  $this->request->getPost())->with(
			        'error',
			        'Please update at least one endorsement field.'
			    );
			}

			
		$policyModel = new \App\Models\Policy\PolicyModel();
		$opsHistoryModel = new \App\Models\Misreport\OpsHistoryModel();
		$cancelEndorseModel = new \App\Models\CancelEndorseModel();
		$tdsModel = new \App\Models\TdsModel();

		$policy = $policyModel->getPolicy($endorse_policy_id);

		if ($policy['status'] == 4)
		{
			return redirect('ops/endorsecertificate')->back()->withInput()
			->with(
			        'error',
			        'Cancelled certificate cannot be endorsed. '
			    );
		}
		if ($policy['status'] == 5)
		{
			return redirect('ops/endorsecertificate')->back()->withInput()->with(
			        'error',
			        'Cancelled endorsed certificate cannot be endorsed. '
			    );
		}

		$policyModel->update($endorse_policy_id, [
			'premium_payable' => 0,
		    'gst' => 0,
		    'premium_ex_gst' => 0,
		    'certificate_status' => 'Inactive'
		]);

		$policyModel->insert([
		    'plan_category' => $policy['plan_category'],
		    'plan_name' => $policy['plan_name'],
		    'premium_payable' => $policy['premium_payable'],
		    'gst' => $policy['gst'],
		    'premium_ex_gst' => $policy['premium_ex_gst'],
		    'certificate_start_date' => $policy['certificate_start_date'],
		    'certificate_end_date' => $policy['certificate_end_date'],
		    'login_type_id' => $policy['login_type_id'],
		    'login_id' => $policy['login_id'],
		    'limited_amount' => $policy['limited_amount'],
		    'status' => 3,
		    'certificate_status' => 'Active'
		]);

		if ($policyModel) 
		{

			$insertId = $policyModel->getInsertID();
			//$id = $policyModel->getInsertID();

			$policyNo =  $this->getEndorsedPolicyNo($policy['policy_no']);

			$policyModel->update($insertId, [
			    'policy_no' => $policyNo
			]); 		

			// update wallet transaction based on Plans
			//$this->updateWalletTransaction($policyNo, $dealerId);

			
			$errors = [];

			if ($this->insertEndorsedNewVehicleDetails($insertId, $policy, $post) !== true) {
			    $errors[] = 'Vehicle Details';
			}

			if ($this->insertEndorsedNewOwnerDetails($insertId, $policy, $post) !== true) {
			    $errors[] = 'Owner Details';
			}

			if ($this->insertEndorsedNewNomineeDetails($insertId, $policy, $post) !== true) {
			    $errors[] = 'Nominee Details';
			}



			$opsHistoryModel->insert([
				'ops_id' => session('user'),
				'status' => 9,
				'remarks' => 'Endorsed certificate no :- '.$policy['policy_no']
			]);
			$returnStatus = $this->mailToDealerAboutEndorsement($policy['policy_no'], $policy['id'], $policy['login_id']);

			if ($returnStatus)
			{
				$cancelEndorseModel->insert([
					'dealer_id' => $policy['login_id'],
					'policy_id' => $endorse_policy_id,
					'updated_by' => session('user_id'),
					'type' => 'endorsement',
					'details' => json_encode($post)
				]);

				$tdsDetails = $tdsModel->where('policy_id', $endorse_policy_id)->first();
				$insertTds = $tdsModel->insert([
					'dealer_id' => $tdsDetails['dealer_id'],
					'policy_id' => $insertId,
					'tds_amount' => $tdsDetails['tds_amount'],
					'gst_amount' => $tdsDetails['gst_amount'],
					'plan_premium_exc_gst' => $tdsDetails['plan_premium_exc_gst'],
					'premium_ex_gst' => $tdsDetails['premium_ex_gst'],
					'commission_amount' => $tdsDetails['commission_amount']

				]);
				
					$tdsModel->where('policy_id', $endorse_policy_id)
			         ->set([
			             'tds_amount' => 0,
			             'gst_amount' => 0,
			             'plan_premium_exc_gst' => 0,
			             'premium_ex_gst' => 0,
			             'commission_amount' => 0
			         ])
			         ->update();

				$this->downloadpolicypdf($insertId);
				return redirect('ops/endorsement/new')->with('error', 'Certificate has been endorsed successfully.');
			} else 
			{
				return redirect('ops/endorsement/new')->with('error', 'Certificate has been endorsed successfully but error in sending mail to dealer.');
			}
		
	 }
	}

	private function getEndorsedPolicyNo($policyNo)
	{
	   $basePolicyNo = preg_replace('/-\d+$/', '', $policyNo);
	   // Find last endorsement
		$policyModel = new \App\Models\Policy\PolicyModel();
		$records = $policyModel
		->select('policy_no')
		->like('policy_no', $basePolicyNo  . '-', 'after')
		->findAll();

		$max = 0;

		foreach ($records as $row) {
		if (preg_match('/^' . preg_quote($basePolicyNo , '/') . '-(\d+)$/', $row['policy_no'], $m)) {
		$max = max($max, (int)$m[1]);
		}
		}

		$nextNo = $basePolicyNo  . '-' . ($max + 1);

		return $nextNo;
	}


	private function insertEndorsedNewVehicleDetails($insertId, $policy, $post)
	{
		$policyVehicleModel = new \App\Models\Policy\PolicyVehicleModel();
		$policyVehicle = $policyVehicleModel->where('policy_id', $policy['policy_id'])->first();

		$policyVehicleModel->insert([
			'veh_reg_no' => !empty($post['new_veh_reg_no']) ? $post['new_veh_reg_no'] : $policyVehicle['veh_reg_no'],
		    'policy_id' => $insertId,
		    'engine_no' => !empty($post['new_engine_no']) ? $post['new_engine_no'] : $policyVehicle['engine_no'],
		    'model_id' =>  $policyVehicle['model_id'],
		    'make_id' =>  $policyVehicle['make_id'],
		    'chassis_no' => !empty($post['new_chassis_no']) ? $post['new_chassis_no'] : $policyVehicle['chassis_no'],
		    'variant_id' => $policyVehicle['variant_id'],
		    'vehicle_type' => $policyVehicle['vehicle_type'],
		    'vehicle_category' => $policyVehicle['vehicle_category']
		]);
		if ($policyVehicleModel) 
		{
			return true;
		}
		else 
		{
			return false;
		}
	}

	private function insertEndorsedNewOwnerDetails($insertId, $policy, $post)
	{
		$policyOwnerModel = new \App\Models\Policy\PolicyOwnerModel();
		$policyOwner = $policyOwnerModel->where('policy_id', $policy['policy_id'])->first();
		$policyOwnerModel->insert([
		    'policy_id' => $insertId,
		    'firstname' => !empty($post['new_firstname']) ? $post['new_firstname'] : $policyOwner['firstname'],
		    'middlename' => !empty($post['new_middlename']) ? $post['new_middlename'] : $policyOwner['middlename'],
		    'lastname' => !empty($post['new_lastname']) ? $post['new_lastname'] : $policyOwner['lastname'],
		    'gender' => !empty($post['new_gender']) ? $post['new_gender'] : $policyOwner['gender'],
		    'email' => !empty($post['new_email']) ? $post['new_email'] : $policyOwner['email'],
		    'mobile' => !empty($post['new_mobile']) ? $post['new_mobile'] : $policyOwner['mobile'],
		    'address' => !empty($post['new_address']) ? $post['new_address'] : $policyOwner['address'],
		    'state' => !empty($post['new_state']) ? $post['new_state'] : $policyOwner['state'],
		    'city' => !empty($post['new_city']) ? $post['new_city'] : $policyOwner['city'],
		    'pincode' => !empty($post['new_pincode']) ? $post['new_pincode'] : $policyOwner['pincode'],
		    'dob' => $policyOwner['dob'],
		    'occupation' => !empty($post['new_occupation']) ? $post['new_occupation'] : $policyOwner['occupation'],
		    'emergency_contact' => $policyOwner['emergency_contact']
		]);
		if ($policyOwnerModel) 
		{
			return true;
		}
		else 
		{
			return false;
		}
	}

	private function insertEndorsedNewNomineeDetails($insertId, $policy, $post)
	{
		$policyNomineeModel = new \App\Models\Policy\PolicyNomineeModel();
		$policyNominee = $policyNomineeModel->where('policy_id', $policy['policy_id'])->first();
		$policyNomineeModel->insert([
		    'policy_id' => $insertId,
		    'nominee_firstname' => !empty($post['new_nominee_firstname']) ? $post['new_nominee_firstname'] : $policyNominee['nominee_firstname'],
		    'nominee_middlename' => !empty($post['new_nominee_middlename']) ? $post['new_nominee_middlename'] : $policyNominee['nominee_middlename'],
		    'nominee_lastname' => !empty($post['new_nominee_lastname']) ? $post['new_nominee_lastname'] : $policyNominee['nominee_lastname'],
		    'nominee_gender' => !empty($post['new_nominee_gender']) ? $post['new_nominee_gender'] : $policyNominee['nominee_gender'],
		    'nominee_dob' => !empty($post['new_nominee_dob']) ? $post['new_nominee_dob'] : $policyNominee['nominee_dob'],
		    'nominee_mobile' => !empty($post['new_nominee_mobile']) ? $post['new_nominee_mobile'] : $policyNominee['nominee_mobile'],
		    'relationship' => !empty($post['new_relationship']) ? $post['new_relationship'] : $policyNominee['relationship']
		]);
		if ($policyNomineeModel) 
		{
			return true;
		}
		else 
		{
			return false;
		}
	}

	private function mailToDealerAboutEndorsement($policyNo, $policyId, $dealerId)
	{
		$dealerDocsModel = new \App\Models\DealerDocsModel();
		$dealerModel = new DealerModel();
		$dealer = $dealerModel
                    ->where('id', $dealerId)
                    ->first();
 
		$data = [
		'dealer_name' => $dealer['name'],
		'dealer_code' => $dealer['dealer_code'],
		'certificate_no' => $policyNo
		];
		$mailSent = Mailer::send(
			$dealer['email'],
			'Certificate No '.$policyNo.' has been endorsed successfully',
			'emails/endorsement_success',
			$data,
			[
			'info@globalaidassurance.com',
			'bhupati.jagi@globalaidassurance.com'
			]
		);


		if ($mailSent) {

		return true;

		} else {

		return false;

		}
	}


	public function endorsementlist()
	{
		$policyModel = new \App\Models\Policy\PolicyModel();
		if (session('login_type') == 1)
		{
			$data['policies'] = $policyModel
			->where('login_id', session('dealer_id'))
			->where('status', 3)
			->findAll();
			return view('dealer/endorsement-list', $data);

		} else 
		{
		    $data['policies'] = $policyModel
		    ->where('status', 3)
		    ->findAll();
		    return view('operations/endorsement-list', $data);
		}

		//return view('sold-policies');

		
	}


	public function downloadpolicypdf($policyId)
{
	$vehicleModel = new \App\Models\VehicleModel();
	$cityModel = new \App\Models\CityModel();
	$stateModel = new \App\Models\StateModel();
	$gAAProductsModel = new \App\Models\GAAProductsModel();
	$gAAProductPlanModel = new \App\Models\GAAProductPlanModel();
	$customizedDealerPlanModel = new \App\Models\CustomizedDealerPlanModel();
	$policyModel = new \App\Models\Policy\PolicyModel();
	//echo $policyId;
	$policy = $policyModel->getPolicyDetails($policyId);
	//print_r($policy); die;
	$imagePath = FCPATH . 'public/assets/images/logo.jpg';
	$imageData = base64_encode(file_get_contents($imagePath));
	$imageType = pathinfo($imagePath, PATHINFO_EXTENSION);

	$logo = 'data:image/' . $imageType . ';base64,' . $imageData;

    $vehicleDetails = $vehicleModel->getVehicleDetails($policy['variant_id']);
   
    if ($policy['plan_category'] != 3 )
    {
   	    $planDetails = $gAAProductPlanModel->getPlanDetails($policy['plan_name']);
    }
    else 
    {
    	$planDetails = $customizedDealerPlanModel->getPlanDetails($policy['plan_name']);

    }
     $planCode = $planDetails['product_code'];
    $explodes = explode("+", $planCode);
    $planRemarks = $gAAProductPlanModel->whereIn('master_product_code', $explodes)
    ->findAll();	
    $stateCityDetails = $cityModel->getCityDetails($policy['city']);
    $data = [
    	//'dealer_code' => session('dealer_id'),
    	//'dealer_name' => session('name'),
        'policy_no' => $policy['policy_no'],
        'firstname' =>  $policy['firstname'],
        'middlename' =>  $policy['middlename'],
        'lastname' =>  $policy['lastname'],
        'gender' =>  $policy['gender'],
        'mobile' =>  $policy['mobile'],
        'address' =>  $policy['address'],
        'state' =>  $stateCityDetails['state_name'],
        'city' =>  $stateCityDetails['city_name'],
        'pincode' =>  $policy['pincode'],
        'mobile' =>  $policy['mobile'],
        'engine_no' => $policy['engine_no'],
        'chassis_no' =>  $policy['chassis_no'],
        'vehicle_model' =>  $policy['variant_id'],
        'veh_reg_no' => $policy['veh_reg_no'],
        'dob' =>$policy['dob'],
        'make' => $vehicleDetails['make_name'],
        'model' => $vehicleDetails['model_name'],
        'variant' => $vehicleDetails['variant_name'],
        'plan' => $planDetails['product_name'],
        'code' => $planDetails['product_code'],
        //'product_code' => $planDetails['master_product_code'],
        'tenure' =>  1,
        'premium' =>  $policy['premium_payable'],
        'gst' =>  $policy['gst'],
        'premium_ex_gst' =>  $policy['premium_ex_gst'],
        'start_date' =>  $policy['certificate_start_date'],
        'certificate_issue_datetime' =>  $policy['created'],
        'expiry_date' =>  $policy['certificate_end_date'],
        'email' =>  $policy['email'],
        'vehicle_type' =>  $policy['vehicle_type'],
        'nominee_firstname' =>  $policy['nominee_firstname'],
        'nominee_middlename' =>  $policy['nominee_middlename'],
        'nominee_lastname' =>  $policy['nominee_lastname'],
        'nominee_gender' =>  $policy['nominee_gender'],
        'nominee_dob' =>  $policy['nominee_dob'],
        'nominee_mobile' =>  $policy['nominee_mobile'],
        'relationship' =>  $policy['relationship'],
        'logo' => $logo,
        'certificate_name' => 'Endorsed Certificate',
        'remarks' => $planRemarks

    ];
  
    $html = view('pdf/certificate-pdf',$data);
    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4','portrait');
	$policyNo = str_replace('/', '-', $policy['policy_no']);
    $dompdf->render();
    $dompdf->stream(
        'Policy_'.$policyNo.'.pdf',
        ['Attachment'=>true]
    );

    $pdfFile='uploads/policies/POL'.$policyNo.'.pdf';
	file_put_contents(
	FCPATH.$pdfFile,
	$dompdf->output()
	);


}


}

?>
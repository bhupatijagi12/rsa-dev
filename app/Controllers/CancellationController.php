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

class CancellationController extends BaseController
{

	public function newcancellation() 
	{
		return view('operations/new-cancellation');
	}

	public function viewcancellation()
	{
		$policyModel = new \App\Models\Policy\PolicyModel();
		$certificate_no = $this->request->getPost('certificate_no');
		$policyDetails = $policyModel->getPolicyDetailsByCert($certificate_no);
		//echo '<pre>'; print_r($data); die	`;
		if ($policyDetails =="")
		{
			return redirect()->back()->with('error', 'No Certificate found. Please try with different certificate number.');
		}
		return view('operations/view-cancellation', $policyDetails);
	}

	public function cancelcertificate()
	{
		$policyModel = new \App\Models\Policy\PolicyModel();
		$walletModel = new \App\Models\Policy\WalletModel();
		$cancelEndorseModel = new \App\Models\CancelEndorseModel();
		$opsHistoryModel = new \App\Models\Misreport\OpsHistoryModel();
		$cancel_policy_id = $this->request->getPost('cancel_policy_id');
		$policyDetails = $policyModel->where('id', $cancel_policy_id)->first();
		//print_r($policyDetails); die;
		if ($policyDetails == null)
		{
			return redirect('ops/cancellation/new')->with('error', 'Error in searching Certificate details.');
		}
		
		if ($policyDetails['status'] == 4)
		{	
			return redirect('ops/cancellation/new')->with('error', 'Certificate already cancelled.');
		}
		if ($policyDetails['status'] == 5)
		{
			return redirect('ops/cancellation/new')->with('error', 'Certificate already endorsed and cancelled.');
		}
		
		if ($policyModel && $policyDetails !="")
		{
			$insertId = $this->insertNewPolicyForCancellation($policyDetails);
			$walletModel = new \App\Models\Policy\WalletModel();
			$walletModel->updateWalletTransaction($policyDetails['login_id'], $policyDetails['premium_payable'], $policyDetails['id'], $policyDetails['policy_no']);

			$policyModel->update($cancel_policy_id, [
			'certificate_status' => 'Inactive'
			]);

			$opsHistoryModel->insert([
				'ops_id' => session('user'),
				'status' => 8,
				'remarks' => 'Cancelled certificate no :- '.$policyDetails['policy_no']
			]);
			$returnStatus = $this->mailToDealerAboutCancellation($policyDetails['policy_no'], $policyDetails['id'], $policyDetails['login_id']);
			if ($returnStatus)
			{	
				$cancelEndorseModel->insert([
					'dealer_id' => $policyDetails['login_id'],
					'policy_id' => $cancel_policy_id,
					'updated_by' => session('user_id'),
					'type' => 'cancellation',
					'details' => $cancel_policy_id
				]);
				$this->downloadpolicypdf($insertId);
				return redirect('ops/cancellation/new')->with('error', 'Certificate has been cancelled successfully.');
			} else 
			{
				return redirect('ops/cancellation/new')->with('error', 'Certificate has been cancelled successfully but error in sending mail to dealer.');
			}
			
		}
	}

	private function mailToDealerAboutCancellation($policyNo, $policyId, $dealerId)
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
			'Certificate No '.$policyNo.' has been cancelled successfully',
			'emails/cancellation_success',
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

	public function cancellationlist()
	{
		$policyModel = new \App\Models\Policy\PolicyModel();
		if (session('login_type') == 1)
		{
			$data['policies'] = $policyModel
			->where('login_id', session('dealer_id'))
			->where('status', 4)
			->findAll();
			return view('dealer/cancelled-policies', $data);

		} else 
		{
		    $data['policies'] = $policyModel
		    ->where('status', 4)
		    ->findAll();
		    return view('operations/cancelled-policies', $data);

		}

		//return view('sold-policies');

	}


	public function insertNewPolicyForCancellation($policy)
	{
		$policyModel = new \App\Models\Policy\PolicyModel();
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
		    'status' => 4,
		    'certificate_status' => 'Active'
		]);


		if ($policyModel) 
		{

			$insertId = $policyModel->getInsertID();
			//$id = $policyModel->getInsertID();

			$policyNo =  $this->getCancelledPolicyNo($policy['policy_no']);

			$policyModel->update($insertId, [
			    'policy_no' => $policyNo
			]); 	

			// update wallet transaction based on Plans
			//$this->updateWalletTransaction($policyNo, $dealerId);

			
			$errors = [];

			if ($this->insertCancelledNewVehicleDetails($insertId, $policy) !== true) {
			    $errors[] = 'Vehicle Details';
			}

			if ($this->insertCancelledNewOwnerDetails($insertId, $policy) !== true) {
			    $errors[] = 'Owner Details';
			}

			if ($this->insertCancelledNewNomineeDetails($insertId, $policy) !== true) {
			    $errors[] = 'Nominee Details';
			}
		
		
	 }
	  return $insertId;

	}

	private function getCancelledPolicyNo($policyNo)
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


	private function insertCancelledNewVehicleDetails($insertId, $policy)
	{
		//print_r($policy); die;
		$policyVehicleModel = new \App\Models\Policy\PolicyVehicleModel();
		$policyVehicle = $policyVehicleModel->where('policy_id', $policy['id'])->first();

		$policyVehicleModel->insert([
			'veh_reg_no' => $policyVehicle['veh_reg_no'],
		    'policy_id' => $insertId,
		    'engine_no' => $policyVehicle['engine_no'],
		    'model_id' => $policyVehicle['model_id'],
		    'make_id' => $policyVehicle['make_id'],
		    'chassis_no' => $policyVehicle['chassis_no'],
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

	private function insertCancelledNewOwnerDetails($insertId, $policy)
	{
		$policyOwnerModel = new \App\Models\Policy\PolicyOwnerModel();
		$policyOwner = $policyOwnerModel->where('policy_id', $policy['id'])->first();
		$policyOwnerModel->insert([
		    'policy_id' => $insertId,
		    'firstname' => $policyOwner['firstname'],
		    'middlename' => $policyOwner['middlename'],
		    'lastname' => $policyOwner['lastname'],
		    'gender' => $policyOwner['gender'],
		    'email' => $policyOwner['email'],
		    'mobile' => $policyOwner['mobile'],
		    'address' => $policyOwner['address'],
		    'state' => $policyOwner['state'],
		    'city' => $policyOwner['city'],
		    'pincode' => $policyOwner['pincode'],
		    'dob' => $policyOwner['dob'],
		    'occupation' => $policyOwner['occupation'],
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

	private function insertCancelledNewNomineeDetails($insertId, $policy)
	{
		$policyNomineeModel = new \App\Models\Policy\PolicyNomineeModel();
		$policyNominee = $policyNomineeModel->where('policy_id', $policy['id'])->first();
		$policyNomineeModel->insert([
		    'policy_id' => $insertId,
		    'nominee_firstname' => $policyNominee['nominee_firstname'],
		    'nominee_middlename' => $policyNominee['nominee_middlename'],
		    'nominee_lastname' => $policyNominee['nominee_lastname'],
		    'nominee_gender' => $policyNominee['nominee_gender'],
		    'nominee_dob' => $policyNominee['nominee_dob'],
		    'nominee_mobile' => $policyNominee['nominee_mobile'],
		    'relationship' => $policyNominee['relationship']
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


	public function downloadpolicypdf($policyId)
{
	$vehicleModel = new \App\Models\VehicleModel();
	$cityModel = new \App\Models\CityModel();
	$stateModel = new \App\Models\StateModel();
	$gAAProductsModel = new \App\Models\GAAProductsModel();
	$gAAProductPlanModel = new \App\Models\GAAProductPlanModel();
	$customizedDealerPlanModel = new \App\Models\CustomizedDealerPlanModel();
	$policyModel = new \App\Models\Policy\PolicyModel();
	$policy = $policyModel->getPolicyDetails($policyId);

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
    $stateCityDetails = $cityModel->getCityDetails($policy['city']);
    $planCode = $planDetails['product_code'];
    $explodes = explode("+", $planCode);
    $planRemarks = $gAAProductPlanModel->whereIn('master_product_code', $explodes)
    ->findAll();	
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
        'certificate_name' => 'Cancel Certificate',
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
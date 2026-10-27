<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\VehicleModel;
use App\Models\ApiModel;
use App\Models\VehicleMakeModel;
use App\Models\VehicleModelModel;
use App\Models\VehicleVariantModel;

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


use Dompdf\Dompdf;
use Dompdf\Options;

class PolicyController extends BaseController
{
	public function policy($planCategory)
	{  
		$productModel = new \App\Models\ProductModel();

		$vehicleModel = new \App\Models\VehicleModel();
		$stateModel = new \App\Models\StateModel();
		$gAAProductsModel = new \App\Models\GAAProductsModel();
		$gAAProductPlanModel = new \App\Models\GAAProductPlanModel();
		$customizedDealerPlanModel = new \App\Models\CustomizedDealerPlanModel();
        $walletModel = new \App\Models\Policy\WalletModel();
        $relationshipModel = new \App\Models\RelationshipModel();
        
    	$data['totalWallet'] =  $walletModel->getWalletBalance(session('dealer_id'));

    	$data['relations'] = $relationshipModel->where('status', 1)->findAll();

		$data['products'] = $productModel
					->where('status', 1)
					->findAll();	

		$data['vehicles'] = $vehicleModel->getAllVehicles();
		$data['makes'] = $vehicleModel->getMakes();
		$data['vehicle_categories'] = $vehicleModel->getVehicleCategory();

		$data['states'] = $stateModel->where('status', 1)
					->findAll();
		$loginType = session('login_type');

		$data['plan'] = $gAAProductsModel
		    ->where('id', $planCategory)
		    ->first();
		$data['plancategory'] =  $planCategory;  
		if ($planCategory == 3) 
		{
			$data['plan_products'] = $customizedDealerPlanModel->where('dealer_id', session('dealer_id'))->where('status', 1)->findAll();
		}  else {  

    	$data['plan_products'] = $gAAProductPlanModel
    		->select(" *, premium_inc_gst as plan_amount")
		    ->where('plan_category', $planCategory)
		    ->findAll();
		}



		return view('dealer/policy', $data);
	}

	public function policyold($policyId)
	{
		$productModel = new \App\Models\ProductModel();
		$vehicleModel = new \App\Models\VehicleModel();
		$stateModel = new \App\Models\StateModel();
		$data['products'] = $productModel
					->where('status', 1)
					->findAll();	
		$data['vehicles'] = $vehicleModel->getAllVehicles();
		$data['states'] = $stateModel->where('status', 1)
					->findAll();

		//print_r($data); die;

		return view('generate-policy', $data);
	}

	public function soldpolicy()
	{
		$policyModel = new \App\Models\Policy\PolicyModel();
		if (session('login_type') == 1)
		{
			/*$data['policies'] = $policyModel
			->where('login_id', session('dealer_id'))
			//->where('status', 1)
			->where('certificate_status', 'Active')
			->findAll();*/
			$data['policies'] = $policyModel
		    ->select('policy_detail.*, certificate_status.status_name')
		    ->join(
		        'certificate_status',
		        'certificate_status.id = policy_detail.status',
		        'left'
		    )
		    ->where('policy_detail.login_id', session('dealer_id'))
		    ->where('policy_detail.certificate_status', 'Active')
		    ->findAll();

		} else 
		{
		   /* $data['policies'] = $policyModel
		    //->where('status', 1)
		    ->where('certificate_status', 'Active')
		    ->findAll();
*/

		    $data['policies'] = $policyModel
		    ->select('policy_detail.*, certificate_status.status_name')
		    ->join(
		        'certificate_status',
		        'certificate_status.id = policy_detail.status',
		        'left'
		    )
		   // ->where('policy_detail.login_id', session('dealer_id'))
		    ->where('policy_detail.certificate_status', 'Active')
		    ->findAll();
		    
		}

		//return view('sold-policies');

		return view('dealer/sold-policies', $data);
	}

	public function cancellation()
	{
		return view('policy-cancellation');
	}

	public function renewalpolicy()
	{
		return view('renewal-policies');
	}

	public function endorsement()
	{
		return view('endorsement-requests');
	}
	public function invoices()
	{
		return view('invoices');
	}
	public function gsttransaction()
	{
		return view('gst-transactions');
	}
	public function generateinvoice()
	{
		return view('generate-invoice');
	}

	public function callapi()
	{
		
		$policyModel = new \App\Models\Policy\PolicyModel();
		$payload = [
   			 'certificates' => [
	        [
	            'title' => 'Mr.',
	            'member_relationship' => 'husband',
	            'master_policy_number' => 'MA76448',
	            'transaction_date' => '2026-10-22',
	            'transaction_number' => '123123123123',
	            'ghi_sum_insured' => '50000',
	            'state' => 'Uttar Pradesh',
	            'good_health_declaration' => 'Y',
	            'subscriber_number' => 'SUB1001',
	            'subscription_start_date' => '2026-10-22',
	            'tenure' => '1 Year',
	            'subscriber_rsa_number' => 'RSA-2026-00011',
	            'subscriber_first_name' => 'Rohit',
	            'subscriber_middle_name' => 'Kumar',
	            'subscriber_last_name' => 'Singh',
	            'subscriber_gender' => 'Male',
	            'subscriber_age' => 28,
	            'subscriber_dob' => '1998-05-15',
	            'insured_address": "123, Gomti Nagar',
			      'city'=> 'Lucknow',
			      'subscriber_state'=>  'Uttar Pradesh',
			      'pin_code'=>  '226010',
			      'insured_mobile'=>  "9876543210",
			      'occupation'=>  "Software Developer",
			      'nominee_first_name'=>  "Anita",
			      'nominee_middle_name'=>  "",
			      'nominee_last_name'=>  "Singh",
			      'nominee_gender'=>  "Female",
			      'nominee_age'=>  55,
			      'nominee_dob'=>  "1971-03-10",
			      'nominee_mobile'=>  "9123456780",
			      'nominee_relationship'=>  "Mother",
			      'dealer_code'=>  "DLR001",
			      'package_name'=>  "RSA",
			      'cargo_value'=>  "1000"

	        ]
    ]
];
		$result = $policyModel->sendCOIApi($payload);
		echo '<pre>';
		print_r($result); die;

	}

	public function generatepolicy()
	{
		$apiModel = new \App\Models\ApiModel();
		$policyModel = new \App\Models\Policy\PolicyModel();

		$policyModel->insert([
		    'plan_category' => $this->request->getPost('plan_category'),
		    'plan_name' => $this->request->getPost('product_name'),
		    'premium_payable' => $this->request->getPost('premium'),
		    'gst' => $this->request->getPost('gst_amount'),
		    'premium_ex_gst' => $this->request->getPost('premium_ex_gst'),
		    'certificate_start_date' => $this->request->getPost('start_date'),
		    'certificate_end_date' => $this->request->getPost('expiry_date'),
		    'login_type_id' => session('login_type'),
		    'login_id' => session('dealer_id'),
		    'limited_amount' => $this->request->getPost('limited_amount'),
		    'status' => 1
		]);

     	$dealerId = session('dealer_id');

     	$insertId = $policyModel->getInsertID();

     	
		
		if ($policyModel) 
		{

			
			//$id = $policyModel->getInsertID();

			$policyNo = 'GAA/' . date('Y') . '/' . str_pad($insertId, 6, '0', STR_PAD_LEFT);

			$policyModel->update($insertId, [
			    'policy_no' => $policyNo
			]); 		

			

			
			$errors = [];

			if ($this->insertVehicleDetails($insertId) !== true) {
			    $errors[] = 'Vehicle Details';
			}

			if ($this->insertOwnerDetails($insertId) !== true) {
			    $errors[] = 'Owner Details';
			}

			if ($this->insertNomineeDetails($insertId) !== true) {
			    $errors[] = 'Nominee Details';
			}
			if (empty($errors)) {

				$return = $apiModel->getApiCall($this->request->getPost('plan_category'), $this->request->getPost('product_name'), $insertId);

				if (!empty($return)) 
				{
					 return redirect()->back()->with(
				        'success',
				         implode(",",$return)
				    );
				} else 
				{
					// update wallet transaction based on Plans
					$this->updateWalletTransaction($policyNo, $dealerId, $insertId);
					$this->downloadPolicyPdf($insertId); // pdf download

				    return redirect()->back()->with(
				        'success',
				        'Policy created successfully.'
				    );
				}

				

			} else {

			    return redirect()->back()->with(
			        'error',
			        'Error in: ' . implode(', ', $errors)
			    );
			}
		
	}
}


	private function updateWalletTransaction($policyNo, $dealerId, $policyId) 
	{
		$planCategory = $this->request->getPost('plan_category');
		$dealerModel = new \App\Models\DealerModel();
     	$dealerDetails = $dealerModel
     					->where('id', $dealerId)
     					->where('status', 1)
     					->first();

     	if ($dealerDetails == null) 
     	{
     		 return redirect()->back()->with(
		        'error',
		        'Dealer not Active'
		    );
     	}
		$walletModel = new \App\Models\Policy\WalletModel();
		$amount   = $this->request->getPost('premium');
        
        // Save to database
        $walletModel->insert([
        	'amount' => $amount,
        	'transaction_type' => 'debit',
        	'status' => 'Approved',
        	'dealer_id' => $dealerId,
        	'login_type' => session('login_type'),
        	'wallet_category' => 1
        ]);

        // for all plan cut and pay module. pause for now
        if ($dealerDetails['dealer_payment'] == 'cut_n_pay' & $planCategory != 3) 
     	{
     		$commission = $dealerDetails['discount_rate'];
     		$commission_amount = ($commission * $amount) / 100;
     		$walletModel->insert([
        	'amount' => $commission_amount,
        	'transaction_type' => 'credit',
        	'status' => 'Approved',
        	'remarks' => 'Cut and Pay amount credited for Certificate issuance no: '.$policyNo,
        	'dealer_id' => $dealerId,
        	'login_type' => session('login_type'),
        	'wallet_category' => 3
        ]);
     	}	

     	// for customized plan and cut and pay payment structure.
     	//if ($dealerDetails['dealer_payment'] == 'cut_n_pay' & $planCategory == 3) 
     	if ($planCategory == 3) 
     	{
     		$tdsModel = new \App\Models\TdsModel();
     		$premium_hidden = $this->request->getPost('premium_hidden'); // 500
     		$gstDeduct = $premium_hidden * 18 / 118;

			// Premium excluding GST
			//$premiumExGST = $premium_hidden - $gstDeduct;
			$premiumExGST = $this->request->getPost('premium_ex_gst');
     		//$commission_amount = $amount - $premiumExGST;	
     		$commission_amount = $premiumExGST - $premium_hidden;	
     		if ($dealerDetails['dealer_payment'] == 'cut_n_pay')
     		{
     		$walletModel->insert([
	        	'amount' => ($commission_amount - ($commission_amount * 0.02)),
	        	'transaction_type' => 'credit',
	        	'remarks' => 'Cut and Pay amount credited for Certificate issuance no: '.$policyNo,
	        	'status' => 'Approved',
	        	'dealer_id' => $dealerId,
	        	'login_type' => session('login_type'),
	        	'wallet_category' => 3
        	 ]);
     		}
        	 $tdsModel->insert([
        	 	'dealer_id' => session('dealer_id'),
        	 	'policy_id' => $policyId,
        	 	'tds_amount' => ($commission_amount * 0.02),
        	 	'gst_amount' => $this->request->getPost('gst_amount'),
        	 	'plan_premium_exc_gst' => $premium_hidden,
        	 	'premium_ex_gst' =>  $premiumExGST,
        	 	'commission_amount' => ($commission_amount - ($commission_amount * 0.02))
        	 ]);


     	}
	}


	private function insertVehicleDetails($policyId)
	{
		$policyVehicleModel = new \App\Models\Policy\PolicyVehicleModel();
		$vehicleModelModel = new \App\Models\VehicleModelModel();
		$vehicleVariantModel = new \App\Models\VehicleVariantModel();
		$model_id = $this->request->getPost('model');
		$make_id = $this->request->getPost('make');
		$variant_id = $this->request->getPost('variant');

		if ($model_id == "other") 
		{
			$vehicleModelModel->insert([
				'make_id' => $make_id,
				'model_name' => $this->request->getPost('other_model')
			]);
			$model_id = $vehicleModelModel->getInsertID();
		}
		
		if ($variant_id == "other") 
		{
			$vehicleVariantModel->insert([
				'model_id' => $model_id,
				'variant_name' => $this->request->getPost('other_variant')
			]);
			$variant_id = $vehicleVariantModel->getInsertID();
		}

		$policyVehicleModel->insert([
			'veh_reg_no' => $this->request->getPost('veh_reg_no'),
		    'policy_id' => $policyId,
		    'engine_no' => $this->request->getPost('engine_no'),
		    'model_id' => $model_id,
		    'make_id' => $make_id,
		    'chassis_no' => $this->request->getPost('chassis_no'),
		    'variant_id' => $variant_id,
		    'vehicle_type' => $this->request->getPost('vehicle_type'),
		    'vehicle_category' => $this->request->getPost('vehicle_category')
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

	private function insertOwnerDetails($policyId)
	{
		$policyOwnerModel = new \App\Models\Policy\PolicyOwnerModel();
		$policyOwnerModel->insert([
		    'policy_id' => $policyId,
		    'firstname' => $this->request->getPost('firstname'),
		    'middlename' => $this->request->getPost('middlename'),
		    'lastname' => $this->request->getPost('lastname'),
		    'gender' => $this->request->getPost('gender'),
		    'email' => $this->request->getPost('email'),
		    'mobile' => $this->request->getPost('mobile'),
		    'address' => $this->request->getPost('address'),
		    'state' => $this->request->getPost('state'),
		    'city' => $this->request->getPost('city'),
		    'pincode' => $this->request->getPost('pincode'),
		    'dob' => $this->request->getPost('dob'),
		    'occupation' => $this->request->getPost('occupation'),
		    'emergency_contact' => $this->request->getPost('emergency_contact')
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

	private function insertNomineeDetails($policyId)
	{
		$policyNomineeModel = new \App\Models\Policy\PolicyNomineeModel();
		$policyNomineeModel->insert([
		    'policy_id' => $policyId,
		    'nominee_firstname' => $this->request->getPost('nominee_firstname'),
		    'nominee_middlename' => $this->request->getPost('nominee_middle_name'),
		    'nominee_lastname' => $this->request->getPost('nominee_lastname'),
		    'nominee_gender' => $this->request->getPost('nominee_gender'),
		    'nominee_dob' => $this->request->getPost('nominee_dob'),
		    'nominee_mobile' => $this->request->getPost('nominee_mobile'),
		    'relationship' => $this->request->getPost('relationship')
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
	
	$policy = $this->getPolicyDetails($policyId);

	$imagePath = FCPATH . 'public/assets/images/logo.jpg';
	$imageData = base64_encode(file_get_contents($imagePath));
	$imageType = pathinfo($imagePath, PATHINFO_EXTENSION);

	$logo = 'data:image/' . $imageType . ';base64,' . $imageData;

    $vehicleDetails = $vehicleModel->getVehicleDetails($policy['variant_id']);
    //echo '<pre>';
   // print_r($vehicleDetails);
    if ($policy['plan_category'] != 3 )
    {
   	    $planDetails = $gAAProductPlanModel->getPlanDetails($policy['plan_name']);
    }
    else 
    {
    	$planDetails = $customizedDealerPlanModel->getPlanDetails($policy['plan_name']);

    }
    $stateCityDetails = $cityModel->getCityDetails($policy['city']);
    //print_r($stateCityDetails); die;
    $planCode = $planDetails['product_code'];
    $explodes = explode("+", $planCode);
    $planRemarks = $gAAProductPlanModel->whereIn('master_product_code', $explodes)
    ->findAll();	
    //print_r($planRemarks); die;
    $data = [
    	'dealer_code' => session('dealer_id'),
    	'dealer_name' => session('name'),
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
        'certificate_name' => 'Certificate',
        'remarks' => $planRemarks

    ];
   //echo "<pre>";
   //print_r($data); die;
// //   $html = view('pdf/policy_pdf',$data);
       $html = view('pdf/certificate-pdf',$data);
    $dompdf = new Dompdf();

    //$dompdf->loadHtml('<h1>Hello World</h1>');


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


 public function checkpremium()
 {
 	$dealerModel = new \App\Models\DealerModel();
    $walletModel = new \App\Models\Policy\WalletModel();

 	$dealer = $dealerModel
        //->select('dealers')
        ->where('id', session('dealer_id'))
        ->first();

    $wallet = $walletModel->getWalletBalance(session('dealer_id')); 
     
    return $this->response->setJSON([
        'limited_premium' => $dealer['limited_amount'],
        'wallet_amount' => $wallet
    ]);
 }


 private function getPolicyDetails($policyId) {

 	$policyModel = new \App\Models\Policy\PolicyModel();

 	return $policyModel->getPolicy($policyId);
 }

 public function getcities()
{
    $stateId = $this->request->getPost('state_id');

    $cityModel = new \App\Models\CityModel();

    $cities = $cityModel
                ->where('state_id', $stateId)
                ->orderBy('city_name', 'ASC')
                ->findAll();
    return $this->response->setJSON($cities);
}


public function getmakes()
{
	$vehicleMakeModel = new \App\Models\VehicleMakeModel();
    $vehicleType = $this->request->getPost('vehicle_category');

    $makes = $vehicleMakeModel
        ->where('vehicle_type', $vehicleType)
        ->findAll();

    return $this->response->setJSON($makes);
}


public function getmodels()
{
	$vehicleModelModel = new \App\Models\VehicleModelModel();
    $makeId = $this->request->getPost('make_id');

    $models = $vehicleModelModel
        ->where('make_id', $makeId)
        ->findAll();

    return $this->response->setJSON($models);
}


public function getvariants()
{
	$vehicleVariantModel = new \App\Models\VehicleVariantModel();
    $modelId = $this->request->getPost('model_id');

    $variants = $vehicleVariantModel
        ->where('model_id', $modelId)
        ->findAll();

    return $this->response->setJSON($variants);
}


public function view($fileName)
{
    if (!session()->has('logged_in')) {
        return redirect()->to('/login');
    }

    $filePath = FCPATH . 'uploads/policies/' . $fileName;

    if (!file_exists($filePath)) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    return $this->response
        ->setHeader('Content-Type', 'application/pdf')
        ->setBody(file_get_contents($filePath));
}


}

?>
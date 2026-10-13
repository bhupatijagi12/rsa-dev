<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\VehicleModel;
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
        $wallet = $walletModel
        ->where('dealer_id', session('dealer_id'))
        ->where('status', 'Approved')
        ->selectSum('amount')
        ->first();
        $data['totalWallet'] = $wallet ?? 0;

		$data['products'] = $productModel
					->where('status', 1)
					->findAll();	

		$data['vehicles'] = $vehicleModel->getAllVehicles();
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
		return view('sold-policies');
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



	public function generatepolicy()
	{

		$policyModel = new \App\Models\Policy\PolicyModel();
		$policyModel->insert([
		    'plan_category' => $this->request->getPost('plan_category'),
		    'plan_name' => $this->request->getPost('product_name'),
		    'premium_payable' => $this->request->getPost('premium'),
		    'gst' => $this->request->getPost('gst_amount'),
		    'premium_ex_gst' => $this->request->getPost('premium_ex_gst'),
		    'certificate_start_date' => $this->request->getPost('start_date'),
		    'certificate_end_date' => $this->request->getPost('expiry_date'),
		    'login_type_id' => session('expiry_date'),
		    'login_id' => session('login_id'),
		    'limited_amount' => $this->request->getPost('limited_amount'),
		    'status' => 1
		]);


		
		if ($policyModel) 
		{
			$insertId = $policyModel->getInsertID();
		//$id = $policyModel->getInsertID();

		$policyNo = 'GAA/' . date('Y') . '/' . str_pad($insertId, 6, '0', STR_PAD_LEFT);

		$policyModel->update($insertId, [
		    'policy_no' => $policyNo
		]); 		

		/*$msg = $this->insertVehicleDetails($insertId);
		$msg .= $this->insertOwnerDetails($insertId);
		$msg .= $this->insertNomineeDetails($insertId);
		die("sdsd");*/
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

		    $this->downloadPolicyPdf($insertId); // pdf download

		    return redirect()->back()->with(
		        'success',
		        'Policy created successfully.'
		    );

		} else {

		    return redirect()->back()->with(
		        'error',
		        'Error in: ' . implode(', ', $errors)
		    );
		}
		
	}
}


	private function insertVehicleDetails($policyId)
	{
		$policyVehicleModel = new \App\Models\Policy\PolicyVehicleModel();
		$policyVehicleModel->insert([
		    'policy_id' => $policyId,
		    'engine_no' => $this->request->getPost('engine_no'),
		    'chassis_no' => $this->request->getPost('chassis_no'),
		    'variant_id' => $this->request->getPost('vehicle_variant'),
		    'vehicle_type' => $this->request->getPost('vehicle_type')
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
	
	$policy = $this->getPolicyDetails($policyId);

	//print_r($policy); die;
	/*
    $data = [
    	'dealer_id' => session('dealer_id'),
        'customer_name' => $this->request->getPost('customer_name'),
        'mobile' => $this->request->getPost('mobile'),
        'engine_no' => $this->request->getPost('engine_no'),
        'chassis_no' => $this->request->getPost('chassis_no'),
        'vehicle_model' => $this->request->getPost('vehicle_model'),
        'plan' => $this->request->getPost('plan'),
        'tenure' => $this->request->getPost('tenure'),
        'premium' => $this->request->getPost('premium'),
        'expiry_date' => $this->request->getPost('expiry_date'),
        'email' => $this->request->getPost('email'),
        'pincode' =>  $this->request->getPost('pincode'),
        'vehicle_type' => $this->request->getPost('vehicle_type'),

    ];



    $data['certificate_no'] = time();
    $data['dealer_name'] = session('name');
    $data['dealer_code'] = session('dealer_code');
    $data['dealer_logo'] = "https://www.hyundai.com/etc/designs/hyundai/ww/en/images/common/logo.png";*/

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
        'state' =>  $policy['state'],
        'city' =>  $policy['city'],
        'pincode' =>  $policy['pincode'],
        'mobile' =>  $policy['mobile'],
        'engine_no' => $policy['engine_no'],
        'chassis_no' =>  $policy['chassis_no'],
        'vehicle_model' =>  $policy['variant_id'],
        'plan' => $policy['plan_name'],
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
        'relationship' =>  $policy['relationship']

    ];
   /* echo "<pre>";
   print_r($data); die;*/
   // view('pdf/policy_pdf',$data); 
    $html = view('pdf/policy_pdf',$data);
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
 	$dealer = $dealerModel
        //->select('dealers')
        ->where('id', session('dealer_id'))
        ->first();
    return $this->response->setJSON([
        'limited_premium' => $dealer['limited_amount']
    ]);
 }


 private function getPolicyDetails($policyId) {

 	$policyModel = new \App\Models\Policy\PolicyModel();

 	return $policyModel->getPolicy($policyId);
 }

}

?>
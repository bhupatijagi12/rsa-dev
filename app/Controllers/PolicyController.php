<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\VehicleModel;
use App\Models\StateModel;
use App\Models\Policy\PolicyModel;
use App\Models\Policy\PolicyOwnerModel;
use App\Models\Policy\PolicyVehicleModel;
use App\Models\Policy\PolicyNomineeModel;

use Dompdf\Dompdf;
use Dompdf\Options;

class PolicyController extends BaseController
{
	public function policy()
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



	public function generatePolicy()
	{
		$policyNomineeModel = new \App\Models\Policy\PolicyNomineeModel();
		$policyModel = new \App\Models\Policy\PolicyModel();

		$policyModel->insert([
		    'policy_no' => "GAA-".time(),
		    'login_type_id' => session('dealer_id'),
		    'status' => 1
		]);

		$insertId = $model->getInsertID();

		$this->insertVehicleDetails($insertId);
		$this->insertOwnerDetails($insertId);
		$this->insertNomineeDetails($insertId);


	}


	private function insertVehicleDetails($policyId)
	{
		$policyVehicleModel = new \App\Models\Policy\PolicyVehicleModel();
		$policyVehicleModel->insert([
		    'policy_id' => $policyId,
		    'engine_no' => $this->request->getPost('engine_no'),
		    'chassis_no' => $this->request->getPost('chassis_no'),
		    'variant_id' => $this->request->getPost('variant_id'),
		    'vehicle_type' => $this->request->getPost('vehicle_type')
		]);

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

	}

	private function insertNomineeDetails($policyId)
	{
		$policyVehicleModel = new \App\Models\Policy\PolicyVehicleModel();
		$policyVehicleModel->insert([
		    'policy_id' => $policyId,
		    'nominee_firstname' => $this->request->getPost('nominee_firstname'),
		    'nominee_middlename' => $this->request->getPost('nominee_middlename'),
		    'nominee_lastname' => $this->request->getPost('nominee_lastname'),
		    'nominee_gender' => $this->request->getPost('nominee_gender'),
		    'nominee_dob' => $this->request->getPost('nominee_dob'),
		    'nominee_mobile' => $this->request->getPost('nominee_mobile'),
		    'relationship' => $this->request->getPost('relationship')
		]);

	}



public function generatePolicy1()
{

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

    $data['policy_no'] = time();
    $data['dealer_name'] = session('name');
    $data['dealer_code'] = session('dealer_code');
    $data['dealer_logo'] = "https://www.hyundai.com/etc/designs/hyundai/ww/en/images/common/logo.png";
   // print_r($data);die;
   // view('pdf/policy_pdf',$data); 
    $html = view('pdf/policy_pdf',$data);
    $dompdf = new Dompdf();
    //$dompdf->loadHtml('<h1>Hello World</h1>');


    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4','portrait');

    $dompdf->render();
    $dompdf->stream(
        'Policy_'.time().'.pdf',
        ['Attachment'=>true]
    );

    $pdfFile='uploads/policies/POL'.time().'.pdf';
	file_put_contents(
	FCPATH.$pdfFile,
	$dompdf->output()
	);
}

}

?>
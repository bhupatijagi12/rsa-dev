<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\VehicleModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class PolicyController extends BaseController
{
	public function policy()
	{
		$productModel = new \App\Models\ProductModel();
		$vehicleModel = new \App\Models\VehicleModel();
		$data['products'] = $productModel
					->where('status', 'Active')
					->findAll();	
		$data['vehicles'] = $vehicleModel->getAllVehicles();

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
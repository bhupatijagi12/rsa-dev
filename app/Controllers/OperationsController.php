<?php

namespace App\Controllers;

use App\Models\DealerModel;
use App\Models\DealerDocsModel;
use App\Models\CustomizedDealerPlanModel;
use App\Models\Policy\PolicyModel;
use App\Models\Misreport\MisModel;

use App\Libraries\Mailer;

class OperationsController extends BaseController
{
  
    public function dashboard()
    {
    	$db = \Config\Database::connect();
    	$totalDealers = $db->table('dealers')
		->countAllResults();
		
		$approvedDealers = $db->table('dealers')
		->where('status', 1)
		->countAllResults();
		
		$rejectedDealers = $db->table('dealers')
		->where('status', 3)
		->countAllResults();
		
		$pendingDealers = $db->table('dealers')
		->where('status', 2)
		->countAllResults();
		$data = [
		'totalDealers' => $totalDealers,
		'approvedDealers' => $approvedDealers,
		'rejectedDealers' => $rejectedDealers,
		'pendingDealers' => $pendingDealers,
		];
        return view('operations/dashboard', $data);
    }

     public function dashboardold()
    {
    	$db = \Config\Database::connect();
    	$totalDealers = $db->table('dealers')
		->countAllResults();
		
		$approvedDealers = $db->table('dealers')
		->where('status', 1)
		->countAllResults();
		
		$rejectedDealers = $db->table('dealers')
		->where('status', 3)
		->countAllResults();
		
		$pendingDealers = $db->table('dealers')
		->where('status', 2)
		->countAllResults();
		$data = [
		'totalDealers' => $totalDealers,
		'approvedDealers' => $approvedDealers,
		'rejectedDealers' => $rejectedDealers,
		'pendingDealers' => $pendingDealers,
		];
        return view('ops/dashboard', $data);
    }

      public function dealers()
    {
    	$dealerModel = new \App\Models\DealerModel();
    	$dealers = $dealerModel
                    ->findAll();
        $dealers = $dealerModel
	    ->select('dealers.*, dealer_status.status as status_name')
	    ->join('dealer_status', 'dealer_status.id = dealers.status', 'left')
	    ->findAll();

		return view('operations/dealer-list', [
		'dealers' => $dealers
		]);
    }

      public function dealersold()
    {
    	$dealerModel = new \App\Models\DealerModel();
    	$dealers = $dealerModel
                    ->findAll();
        $dealers = $dealerModel
	    ->select('dealers.*, dealer_status.status as status_name')
	    ->join('dealer_status', 'dealer_status.id = dealers.status', 'left')
	    ->findAll();

		return view('ops/dealers-list', [
		'dealers' => $dealers
		]);
    }


    public function viewDocuments($dealerId)
    {
    	$dealerDocModel = new \App\Models\DealerDocsModel();
    	$data = $dealerDocModel
    			->where("dealer_id", $dealerId)
    			->first();
    	$data['dealer_id'] = $dealerId;


    	return view('ops/view-documents', $data);
    }


    public function download($dealerId, $file)
	{
	   

	    $dealerDocsModel = new \App\Models\DealerDocsModel();

	    $dealer = $dealerDocsModel->where("dealer_id", $dealerId)
    			->first();
	   
	    if ($file == "agreement") {
	    	$fileName = $dealer['agreement'];
	    } else if ($file == "pan") {
	    	$fileName = $dealer['pan'];
	    } else if ($file == "msme") {
	    	$fileName = $dealer['msme'];
	    } else if ($file == "gst") {
	    	$fileName = $dealer['gst'];
	    } else if ($file == "cancelled_cheque") {
	    	$fileName = $dealer['cancelled_cheque'];
	    }
 		
	    $filePath = FCPATH . 'uploads/documents/' . $fileName;

	    if (!file_exists($filePath))
	    {
	        return redirect()->back()->with(
	            'error',
	            'File not found.'
	        );
	    }

	    return $this->response->download(
	        $filePath,
	        null
	    );
	}


	public function verify() 
	{
		$dealerId =  $this->request->getPost('dealer_id');
		$status =  $this->request->getPost('status');
		if ($status == "Approve") 
		{
			$statusId = 1;
		}
		if ($status == "Reject") 
		{
			$statusId = 3;
		}
		$dealerModel = new \App\Models\DealerModel();
		$dealerModel->update($dealerId, [
			'status' => $statusId
			]);

		 $dealer = $dealerModel
                    ->where('id', $dealerId)
                    ->first();

		$data = [
		'dealer_name' => $dealer['name'],
		'dealer_code' => $dealer['dealer_code'],
		'status' => $status
		];
		$mailSent = Mailer::send(
			$dealer['email'],
			'RSA Dealer Onboarding Documents '. $status,
			'emails/document_status',
			$data,
			[
			'info@globalaidassurance.com',
			'bhupati.jagi@globalaidassurance.com'
			]
		);


		 return $this->response->setJSON([
                'status' => 'success',
                'message' => $status
            ]);

	}

	public function viewplan($dealerId)
    {
    	$dealerDocModel = new \App\Models\DealerDocsModel();
    	$gAAProductPlanModel = new \App\Models\GAAProductPlanModel();
    	$gAAProductModel = new \App\Models\GAAProductsModel();
    	$customizedDealerPlanModel = new \App\Models\CustomizedDealerPlanModel();

    	$data['gaamasterproducts'] = $gAAProductModel->where('active', 1)->findAll();
    	/*$data['gaaproducts'] = $gAAProductPlanModel
    			->where("status", 1)
    			->findAll();*/
    	$data['gaaproducts'] = $gAAProductPlanModel
    ->select('gaa_product_plans.*, gaa_products.product_name as category_name')
    ->join('gaa_products', 'gaa_products.id = gaa_product_plans.plan_category', 'left')
    ->where('gaa_product_plans.status', 1)
    ->findAll();
    	$data['dealer_id'] = $dealerId;
    	//print_r($data); die;
    	$data['dealerCustomizedPlans'] = $customizedDealerPlanModel
    			->where('status', 1)
    			->where('dealer_id', $dealerId)->findAll();

    	return view('operations/view-plan', $data);
    }

    public function updateplan()
    {

    	   $customizedDealerPlanModel = new \App\Models\CustomizedDealerPlanModel();

    	   $planid = $this->request->getPost('planid');
    	   if(empty($planid)) {
    	   	  return redirect()->back()->with('error', 'Please select plans.');

    	   }
    	   $dealerId = $this->request->getPost("dealerId");

    	   $productString = implode('+', $planid);

    	   $customizedDealerPlanModel->insert([
			    
			    'product_code'  => $productString,
			    'dealer_id' => $dealerId,
			    'status' => 1,
			    'product_name' => $productString
			]);

    	   //redirect('ops/viewplan/'.$dealerId);
    	   return redirect()->back()->with('success', 'Products saved successfully.');

    }


    public function wallettransaction($walletId)
	{
		$walletModel = new \App\Models\Policy\WalletModel();
		$data['transactions'] = $walletModel->where('dealer_id', $walletId)->findAll();
		return view('operations/wallet-transaction', $data);
	}



	public function updatewalletstatus() 
	{
		$dealerId =  $this->request->getPost('dealer_id');
		$status =  $this->request->getPost('status');
		$walletId =  $this->request->getPost('wallet_id');
		
		$walletModel = new \App\Models\Policy\WalletModel();

		$walletModel->update($walletId, [
			'status' => $status,
			'updated_by' => session('user')
			]);
		$wallet = $walletModel->where('id', $walletId)->first();
		$dealerModel = new \App\Models\DealerModel();
		$dealer = $dealerModel
                    ->where('id', $dealerId)
                    ->first();

		$data = [
		'dealer_name' => $dealer['name'],
		'dealer_code' => $dealer['dealer_code'],
		'status' => $status,
		'utr_no' => $wallet['transaction_no'],
		'updatedatetime' => $wallet['updated_date'],
		'updated_by' => $wallet['updated_by']
		];
		$mailSent = Mailer::send(
			$dealer['email'],
			'Wallet Transaction status '. $status,
			'emails/ops_wallet_update',
			$data,
			[
			'info@globalaidassurance.com',
			'bhupati.jagi@globalaidassurance.com'
			]
		);

		if($mailSent)
		{
			 return $this->response->setJSON([
                'status' => 'success',
                'message' => $status
            ]);
		} else {
				 return $this->response->setJSON([
                'status' => 'error',
                'message' => $status
            ]);
	}
		

	}

	public function updateplanamount()
	{
		$customizedDealerPlanModel = new \App\Models\CustomizedDealerPlanModel();
		$amount =  $this->request->getPost('amount');
	    $plan_id =  $this->request->getPost('plan_id');

		$customizedDealerPlanModel->update($plan_id, [
			    'plan_amount'  => $amount,
			    'login_type' => session('user_type'),
			    'updated_by' => session('user_id')
			]);



		if ($customizedDealerPlanModel) 
		{
			return $this->response->setJSON([
                'status' => 'success',
                'message' => "Plan amount updated successfully"
            ]);
		} else 
		{
			return $this->response->setJSON([
                'status' => 'success',
                'message' => "Error in update. please try again.."
            ]);
		}


	}

	public function soldpolicy()
	{
		$policyModel = new \App\Models\Policy\PolicyModel();

		if (session('login_type') == 1)
		{
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

		return view('operations/sold-policies', $data);
	}

	public function mis()
	{
		$misModel = new \App\Models\Misreport\MisModel();

		if (session('login_type') == 1)
		{
			$data['misreports'] = $misModel->where('download_by', session('dealer_id'))->findAll();

		} else 
		{
		    $data['misreports'] = $misModel->findAll();

		}

		//return view('sold-policies');

		return view('operations/mis', $data);
	}

	public function downloadmis()
	{
		$misModel = new \App\Models\Misreport\MisModel();
		$toDate = $this->request->getPost('to_date');
		$fromDate = $this->request->getPost('from_date');
		$misModel->exportPoliciesCsv($toDate, $fromDate);
	}

	public function viewdealer($dealerId) 
	{
		$dealerModel = new \App\Models\DealerModel();
		$dealerDetails = $dealerModel->where('id', $dealerId)->first();
		$data['detail'] = $dealerDetails;
		return view('operations/dealer', $data);

	}

	public function updatedealer()
	{
		$dealerModel = new \App\Models\DealerModel();
		$dealerId = $this->request->getPost('dealerId');
		$dealerModel->update($dealerId, [
			    'account_holder_name' => $this->request->getPost('account_holder_name'),
			    'account_number' => $this->request->getPost('account_number'),
			    'ifsc_code' => $this->request->getPost('ifsc_code'),
			    'bank_name' => $this->request->getPost('bank_name'),
			    'dealer_payment' => $this->request->getPost('dealer_payment'),
			    'payment_mode' => $this->request->getPost('payment_mode'),
			    'discount_rate' => $this->request->getPost('discount_rate'),
			    'limited_amount' => $this->request->getPost('limited_amount')
			]);
		if ($dealerModel)
		{
			 return redirect()->back()->with('success', 'Dealer details updated successfully.');
		} else 
		{
			 return redirect()->back()->with('error', 'Error in updating dealer details.');

		}
	}

}

?>

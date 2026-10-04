<?php

namespace App\Controllers;

use App\Models\DealerModel;
use App\Models\DealerDocsModel;
use App\Libraries\Mailer;

class OperationsController extends BaseController
{
  
    public function dashboard()
    {
        return view('ops/dashboard');
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

	    $dealer = $dealerDocsModel->find($dealerId);
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

}

?>

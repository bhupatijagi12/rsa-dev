<?php

namespace App\Controllers;

use App\Models\DealerModel;
use App\Models\DealerDocsModel;
use App\Libraries\Mailer;

class OnboardingController extends BaseController
{
	public function index() 
	{
	   $dealerModel = new \App\Models\DealerModel();
		$dealer = $dealerModel
                    ->where('dealer_code', session('dealer_code'))
                    ->first();

		 return view('onboarding', $dealer);
	}

	public function session()
	{
		echo '<pre>';
		print_r(session()->get());
		echo '</pre>';	
	}

	public function saveOnboarding()
	{
	    $data = [
	        'dealer_payment' => $this->request->getPost('dealer_payment'),
	        'payment_mode' => $this->request->getPost('payment_mode'),
	        'limited_amount' => $this->request->getPost('limited_amount'),
	        'address' => $this->request->getPost('address'),
	        'contact_person' => $this->request->getPost('contact_person'),
	        'mobile' => $this->request->getPost('mobile'),
	        'rm_name' => $this->request->getPost('rm_name'),
	        'referred_by' => $this->request->getPost('referred_by'),
	        'account_holder_name' => $this->request->getPost('account_holder_name'),
	        'account_number' => $this->request->getPost('account_number'),
	        'ifsc_code' => $this->request->getPost('ifsc_code'),
	        'bank_name' => $this->request->getPost('bank_name')
	    ];

	    $dealerModel = new DealerModel();
	    $dealerModel->update(session('dealer_id'), $data);

	    return $this->response->setJSON([
	        'status' => 'success',
	        'message' => 'Dealer onboarding saved successfully.',
	        //'redirect_url' => base_url('dashboard')
	    ]);
	}

	public function upload() 
	{
	   $dealerModel = new \App\Models\DealerModel();
	    $dealerDocsModel = new \App\Models\DealerDocsModel();
	   $dealer = $dealerModel
                    ->where('dealer_code', session('dealer_code'))
                    ->first();
        $data = $dealerDocsModel
                    ->where('dealer_id', session('dealer_id'))
                    ->first();
      if (empty($data['comments'])) {
         $data['comments'] = "";
        }
        
        return view('upload-documents', $data);
	}

	public function uploadDocuments()
	{
	    $dealerId = session('dealer_id'); 

	    $uploadPath = FCPATH . 'uploads/documents/';

	    if (!is_dir($uploadPath)) {
	        mkdir($uploadPath, 0777, true);
	    }

	    $documents = [];
	   
	    $fileFields = [
	        'agreement',
	        'pan',
	        'msme',
	        'gst',
	        'cancelled_cheque'
	    ];
	    $isFileUploaded = 0;
	    foreach ($fileFields as $field)
	    {
	        $file = $this->request->getFile($field);

	        if ($file && $file->isValid())
	        {
	            $newName = time().'_'.$file->getRandomName();

	            $file->move($uploadPath, $newName);

	            $documents[$field] = $newName;
	        }
	        else
	        {
	            $documents[$field] = null;
	            $isFileUploaded++;
	        }
	    }
	    if ($isFileUploaded == 5) {
	    	  return $this->response->setJSON([
	        'status' => 'error',
	        'message' => 'Please upload atlease any one image'
	    ]);
	    }

	    //$db = \Config\Database::connect();
	    $dealerDocsModel = new DealerDocsModel();

	    $dealer = $dealerDocsModel
                    ->where('dealer_id', session('dealer_id'))
                    ->first();

        if ($dealer != null) {

				$updateData = [];
				$updateData["comments"] = $this->request->getPost("comments");
				if (!empty($documents['agreement'])) {
					$updateData['agreement'] = $documents['agreement'];
				}
				
				if (!empty($documents['pan'])) {
					$updateData['pan'] = $documents['pan'];
				}
		
				if (!empty($documents['msme'])) {
					$updateData['msme'] = $documents['msme'];
				}
			
				if (!empty($documents['gst'])) {
					$updateData['gst'] = $documents['gst'];
				}
				
				if (!empty($documents['cancelled_cheque'])) {
					$updateData['cancelled_cheque'] = $documents['cancelled_cheque'];
				}

				if (!empty($updateData)) {
					$dealerDocsModel->update(
					session('dealer_id'),
					$updateData
					);
				}

        } else {
        	$dealerDocsModel->insert([
	        'dealer_id'         => $dealerId,
	        'agreement'         => $documents['agreement'],
	        'pan'               => $documents['pan'],
	        'msme'              => $documents['msme'],
	        'gst'               => $documents['gst'],
	        'cancelled_cheque'  => $documents['cancelled_cheque'],
	        'comments'          => $this->request->getPost("comments")
	    ]);
        }


	    
	    return $this->response->setJSON([
	        'status' => 'success',
	        'message' => 'Documents uploaded successfully.'
	    ]);
	}


	public function downloadAgreement()
	{
	    $dealerId = session('dealer_id');

	    $dealerDocsModel = new \App\Models\DealerDocsModel();

	    $dealer = $dealerDocsModel->find($dealerId);

	    $filePath = FCPATH . 'uploads/documents/' . $dealer['agreement'];

	    if (!file_exists($filePath))
	    {
	        return redirect()->back()->with(
	            'error',
	            'Agreement file not found.'
	        );
	    }

	    return $this->response->download(
	        $filePath,
	        null
	    );
	}



	public function submitOnboarding()
	{
	    $dealerDocsModel = new \App\Models\DealerDocsModel();

	    $dealer = $dealerDocsModel
	        ->where('dealer_id', session('dealer_id'))
	        ->first();

	    $missingDocs = [];

	    if (empty($dealer['gst'])) {
	        $missingDocs[] = 'GST';
	    }

	    if (empty($dealer['agreement'])) {
	        $missingDocs[] = 'Agreement';
	    }

	    if (empty($dealer['msme'])) {
	        $missingDocs[] = 'MSME';
	    }

	    if (empty($dealer['pan'])) {
	        $missingDocs[] = 'PAN';
	    }

	    if (empty($dealer['cancelled_cheque'])) {
	        $missingDocs[] = 'Cancelled Cheque';
	    }

	    if (!empty($missingDocs)) {

	        return $this->response->setJSON([
	            'status'  => 'error',
	            'message' => implode(', ', $missingDocs) .
	                         ' documents not uploaded yet. Please upload.'
	        ]);
	    }

	    $dealerModel = new DealerModel();
	     $statusData = [
	        'status' => 4,
	    ];
	    $dealerModel->update(session('dealer_id'), $statusData);

	    $dealer = $dealerModel
                    ->where('dealer_code', session('dealer_code'))
                    ->first();
 
		$data = [
		'dealer_name' => $dealer['name'],
		'dealer_code' => $dealer['dealer_code']
		];
		$mailSent = Mailer::send(
			$dealer['email'],
			'RSA Dealer Onboarding Documents Submitted Successfully',
			'emails/onboarding_success',
			$data,
			[
			'info@globalaidassurance.com',
			'bhupati.jagi@globalaidassurance.com'
			]
		);


		if ($mailSent) {

		return $this->response->setJSON([
		'status'  => 'success',
		'message' => 'Your application has been submitted successfully. Our team will review your documents and contact you shortly.'
		]);

		} else {

		return $this->response->setJSON([
		'status'  => 'error',
		'message' => 'Unable to send confirmation email.'
		]);

		}

	}
}
?>
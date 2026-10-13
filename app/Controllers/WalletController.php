<?php

namespace App\Controllers;
use App\Models\Policy\WalletModel;
use App\Libraries\Mailer;
use App\Models\DealerModel;


class WalletController extends BaseController
{
	public function wallettransaction()
	{
		$walletModel = new \App\Models\Policy\WalletModel();
		$data['transactions'] = $walletModel->where('dealer_id', session('dealer_id'))->findAll();
		return view('dealer/wallet-transaction', $data);
	}

	public function updatewallettransaction()
{	
	$walletModel = new \App\Models\Policy\WalletModel();
    $dealerId = $this->request->getPost('dealer_id');
    $amount   = $this->request->getPost('amount');
    $utrNo    = $this->request->getPost('utr_no');

    $file = $this->request->getFile('transaction_file');

    if ($file && $file->isValid() && !$file->hasMoved()) {

        $newName = $file->getRandomName();

        $file->move(
            FCPATH . 'uploads/wallet-transactions/',
            $newName
        );

        $filePath = 'uploads/wallet-transactions/' . $newName;

        // Save to database
        $walletModel->insert([
        	'amount' => $amount,
        	'transaction_no' => $utrNo,
        	'file_upload' => $newName,
        	'transaction_type' => 'credit',
        	'status' => 'Pending',
        	'dealer_id' => $dealerId
        ]);
    }
    $dealerModel = new DealerModel();
    $dealer = $dealerModel
                    ->where('dealer_code', session('dealer_code'))
                    ->first();
    $data = [
		'dealer_name' => $dealer['name'],
		'dealer_code' => $dealer['dealer_code'],
		'utr_no' => $utrNo,
		'amount' => $amount
		];
    $mailSent = Mailer::send(
			$dealer['email'],
			'Uploaded Transactions in Wallet by Dealer',
			'emails/dealer_wallet_update',
			$data,
			[
			'info@globalaidassurance.com',
			'bhupati.jagi@globalaidassurance.com'
			]
		);
	    if ($mailSent) {
	    	 return redirect()->back()
	                     ->with('success', 'Transaction submitted successfully.');
	    } else {
	    	 return redirect()->back()
	                     ->with('error', 'Error in sending mail.');
	    }
	}

	public function downloadwalletfile($walletId)
	{
		$walletModel = new \App\Models\Policy\WalletModel();
		$wallet = $walletModel->where('id', $walletId)->first();
		$fileName = $wallet['file_upload'];
		 $filePath = FCPATH . 'uploads/wallet-transactions/' . $fileName;

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
}

?>

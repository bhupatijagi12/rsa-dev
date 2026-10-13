<?php

namespace App\Controllers;

use App\Models\DealerModel;
use App\Models\GAAProductsModel;
use App\Models\Policy\WalletModel;

class DashboardController extends BaseController
{
    public function index() 
    {
        $walletModel = new \App\Models\Policy\WalletModel();
        $data['forcePasswordChange'] = true;
        $wallet = $walletModel
        ->where('dealer_id', session('dealer_id'))
        ->where('status', 'Approved')
        ->selectSum('amount')
        ->first();
        $data['totalWallet'] = $wallet ?? 0;
        return view("dealer/index", $data);
    }
      public function indexold() 
    {
        $data['forcePasswordChange'] = true;
        return view('dashboard', $data);
    }
	public function changePassword()
    {
        $dealerId = session('dealer_id');

        $oldPassword     = $this->request->getPost('old_password');
        $newPassword     = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        $dealerModel = new \App\Models\DealerModel();

        $dealer = $dealerModel->find($dealerId);

        if(!password_verify($oldPassword, $dealer['password']))
        {
            return $this->response->setJSON([
                'status'=>'error',
                'message'=>'Current password is incorrect.'
            ]);
        }

        if($newPassword != $confirmPassword)
        {
            return $this->response->setJSON([
                'status'=>'error',
                'message'=>'Passwords do not match.'
            ]);
        }

        $dealerModel->update($dealerId,[
            'password' => password_hash(
                $newPassword,
                PASSWORD_DEFAULT
            ),
            'is_first_loggged_in' => 0
        ]);

        return $this->response->setJSON([
            'status'=>'success',
            'message'=>'Password updated successfully.'
        ]);
    }

    public function products()
    {
        $gAAProductsModel = new \App\Models\GAAProductsModel();
        $loginType = session('login_type');
        $data['products'] = $gAAProductsModel->
        where("FIND_IN_SET($loginType, login_type) !=", 0)
        ->findAll();

        return view('products', $data);
    }
    public function comingsoon()
    {
        return view('ew-coming-soon');
    }
}

?>
<?php

namespace App\Controllers;

use App\Models\DealerModel;
use App\Models\GAAProductsModel;
use App\Models\Policy\WalletModel;
use App\Libraries\Mailer;
use App\Models\TdsModel;

class DashboardController extends BaseController
{
    public function index() 
    {
    $walletModel = new \App\Models\Policy\WalletModel();
    $tdsModel = new \App\Models\TdsModel();
    $data['forcePasswordChange'] = true;
    $data['verifyOtp'] = "verified";
    $data['totalWallet'] =  $walletModel->getWalletBalance(session('dealer_id'));
    $data['commission'] =  $tdsModel->getCommissionAmount(session('dealer_id'));

    if (session()->get('is_dealer_dashboard_otp_verified') == "no")
    {
        $data['verifyOtp'] = "not_verified";
        $this->sendMailForDashboardOtp();
    } 
    //print_r($data); die;
    return view("dealer/index", $data);
    }

    private function sendMailForDashboardOtp()
    {
        $otp = rand(100000, 999999);
         $data = [
        'dealer_name' => session('name'),
        'otp' => $otp
        ];

        $mailSent = Mailer::send(
            session('dealer_email'),
            'Dealer Dashboard OTP',
            'emails/dashboard-otp',
            $data,
            [
            'info@globalaidassurance.com',
            'bhupati.jagi@globalaidassurance.com'
            ]
        );

        if ($mailSent) {
            //echo "successfully"; die;
           
            session()->set([
                'dealer_dashboard_otp' => $otp
            ]);

        } else {

            
        }
    }

    public function verifydashboardotp()
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/');
        }
        $otp = $this->request->getPost("otp");

        if (session()->has('dealer_dashboard_otp') == $otp) 
        {
            session()->set([
                'is_dealer_dashboard_otp_verified' => "yes"
            ]);
            return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'OTP successfully verified'
                ]);
        } 
        else 
        {
            return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'OTP verification failed'
                ]);
        }
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
        ->where('active', 1)
        ->findAll();

        return view('products', $data);
    }
    public function comingsoon()
    {
        return view('ew-coming-soon');
    }
}

?>
<?php

namespace App\Controllers;

use App\Models\DealerModel;
use App\Libraries\Mailer;


class DealerAuth extends BaseController
{

    public function sendOtp()
    {
        $dealerCode = $this->request->getPost('dealer_code');
        $password   = $this->request->getPost('password');

        $dealerModel = new \App\Models\DealerModel();

        $dealer = $dealerModel
                    ->where('dealer_code', $dealerCode)
                    ->first();

        if (!$dealer) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid Dealer Code'
            ]);
        }


        if (!password_verify($password, $dealer['password'])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid Password'
            ]);
        }

        $otp = rand(100000, 999999);
        $dealerModel->update($dealer['id'], [
        'otp' => $otp,
        'otp_expiry' => date('Y-m-d H:i:s', strtotime('+10 minutes'))
        ]);

        session()->set([
            'dealer_id' => $dealer['id'],
            'dealer_email' => $dealer['email'],
            'dealer_otp' => $otp,
            'first_logged_in' => $dealer['is_first_logged_in'],
            'otp_time' => time(),
            'dealer_status' => $dealer['status'],
            'dealer_code' => $dealer['dealer_code'],
            'name' => $dealer['name'],
            'logged_in' => true
        ]);

        $data = [
        'dealer_name' => $dealer['name'],
        'otp' => $otp
        ];

        $mailSent = Mailer::send(
            $dealer['email'],
            'Dealer Login OTP',
            'emails/otp',
            $data,
            [
            'info@globalaidassurance.com',
            'bhupati.jagi@globalaidassurance.com'
            ]
        );

        if ($mailSent) {

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'OTP sent successfully.',
                'redirect_url' => site_url('otp-verification')
            ]);

        } else {

            return $this->response->setJSON([
                'status' => 'error',
                'message' => $email->printDebugger(['headers'])
            ]);
        }
    }

    public function otpVerification()
    { 
        if (!session()->has('dealer_otp')) {
            return redirect()->to('/');
        }
        if ( !session()->has('otp_time') || (time() - session('otp_time')) > 600 ) {
            session()->destroy();
            return redirect()->to('/');
        }

        $data = [
            'email' => session('dealer_email'),
            'mobile' => session('dealer_mobile')
        ];

        return view('otp', $data);
    }

    public function verifyOtp()
    {
        $otp = $this->request->getPost('otp');

        if((time() - session('otp_time')) > 300)
            {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'OTP expired. Please request a new OTP.'
                ]);
            }

        if ($otp == session('dealer_otp'))
        {
            session()->set('logged_in', true);

            if (session('first_logged_in') && ( session('dealer_status') == 2 || session('dealer_status') == 4)) 
            {
                return $this->response->setJSON([
                    'status' => 'success',
                    'redirect_url' => site_url('onboarding')
                ]);
            } 
            else 
            {
                return $this->response->setJSON([
                    'status' => 'success',
                    'redirect_url' => site_url('products')
                ]);
            }
           
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Invalid OTP'
        ]);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }

}
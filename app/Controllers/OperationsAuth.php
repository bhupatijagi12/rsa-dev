<?php

namespace App\Controllers;

class OperationsAuth extends BaseController
{
  
    public function opsLogin(): string
    {
        return view('ops/login');
    }

    public function validateLogin()
    {
    	$username = $this->request->getPost('ops_code');
        $password   = $this->request->getPost('password');

        $userModel = new \App\Models\userModel();

        $user = $userModel
                ->where('user', $username)
                ->where('password', $password)
                ->first();

        if ($user) {
              session()->set([
                'user_id' => $user['id'],
                'user_type' => $user['login_type'],
                'user' => $user['user'],
                'logged_in' => true
            ]);


        	 return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Login success.',
                'redirect_url' => site_url('ops/dashboard')
            ]);

        	} else {

            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid Credentials'
            ]);
        }



      
    }

}

?>

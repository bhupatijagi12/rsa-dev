<?php

namespace App\Controllers;

use App\Models\DealerModel;

class DashboardController extends BaseController
{
    public function index() 
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
        return view('products');
    }
    public function comingsoon()
    {
        return view('ew-coming-soon');
    }
}

?>
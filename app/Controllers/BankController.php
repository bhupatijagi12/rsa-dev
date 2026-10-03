<?php

namespace App\Controllers;

class BankController extends BaseController
{
	public function bank()
	{
		return view('bank-transactions');
	}

	public function bankstatement()
	{
		return view('account-statement');
	}
}

?>
<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function opsLogin(): string
    {
        return view('ops-login');
    }

     public function about(): string
    {
        return view('welcome_message');
    }
}

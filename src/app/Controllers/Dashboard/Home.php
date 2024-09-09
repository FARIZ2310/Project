<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('role')) {
            return redirect()->to('login');
        }
        return view('Dashboard/home');
    }
}

<?php

namespace Isaac\App\Controllers;
use Isaac\Core\Helpers\Controller;

class FarmerController extends Controller{

    public function __construct() {
        if(isLoggedIn() != 'true' && isOfficer() != 'true')
            redirect('/login');
        $this->officer = $this->model('Users');
    }

    public function index()
    {
        return view('/officers/dashboard');
    }

}
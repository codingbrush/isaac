<?php

namespace Isaac\App\Controllers;

use Isaac\Core\Helpers\Controller;

class ReportsController extends Controller{

    public function __construct()
    {
        if(isLoggedIn() != 'true')
            redirect('/login');
        $this->reports = $this->model('Reports');
    }

    public function index()
    {
        return view('reports/index');
    }

    public function save()
    {
        die(var_dump($_POST));
    }
}
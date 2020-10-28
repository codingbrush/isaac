<?php

namespace Isaac\App\Controllers;
use Isaac\Core\Helpers\Controller;

class DashboardController extends Controller{

    /**
     * @var object
     */
    private $users;

    public function __construct() {
        if(isLoggedIn() != 'true')
            redirect('/login');
        $this->users = $this->model('Users');
    }

    public function dashboard()
    {
        $data = [
            'count_extensions' => $this->users->getNumberOfExtensionOfficers(),
            'count_farmers' => $this->users->getNumberOfFarmers()
        ];
        //die(var_dump($data['count_extensions']->extension_officers));
        return view('dashboard',$data);
    }
}
<?php 

namespace Isaac\App\Controllers;

use Isaac\Core\Helpers\Controller;

class ProfileController extends Controller
{
    protected $user;
    
    public function __construct() {
        if (isLoggedIn() != 'true') {
            redirect('/login');
        }

        $this->users = $this->model('User');
    }

    public function index()
    {

    }
}
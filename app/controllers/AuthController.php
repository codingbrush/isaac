<?php

namespace Isaac\App\Controllers;

use Isaac\Core\Helpers\Controller;

class AuthController extends Controller
{

    public $users;

    public function __construct()
    {
        $this->users = $this->model('Users');
    }

    public function login()
    {
        //Filter the values sent by the user for XSS attacks
        $post     = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $email    = clean($post['email']);
        $password = clean($post['password']);
        //
        /*call the authenticate method on the user model to verify user credentials*/
        $auth = $this->users->authenticate($email, $password);

        //Initialize the data
        $data = [
            'password_err' => '',
            'email_err'    => '',
        ];
        if ($auth) {
           if(isAdmin())
           {
                redirect('/dashboard');
           }
           elseif(isOfficer())
           {
                redirect('/officer/dashboard');
           }elseif(isFarmer()){
               redirect('/farmer/dashboard');
           }
            //session_create('success',"Welcome,{$auth->firstname}");
           // redirect('/dashboard');

        } else {

            $data['email_err']    = $_SESSION['email_err'] ?? "";
            $data['password_err'] = $_SESSION['password_err'] ?? "";
            session_destroy();
            if (!empty($data['email_err'] || !empty($data['password_err']))) {
                return view('login', $data);
            }

        }
    }

    public function logout()
    {
        if ($_POST['logout'] == 'logout') {
            $logout = $this->users->logout();
            if ($logout) {
                redirect('/login');
            }
        }
    }
    
}

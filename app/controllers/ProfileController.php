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

        $this->users = $this->model('Users');
    }

    public function index()
    {
        $id = $_SESSION['user_id'];
        $data[] = $this->users->getUserById($id);
        //dd($data);
        return view('profile/index',$data);
    }

    public function edit($id)
    {
        $id = $id['id'];
        $data[] = $this->users->getUserById($id);
        return view('profile/create',$data);
    }

    public function update($id)
    {

    }
}
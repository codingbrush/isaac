<?php 

namespace Isaac\App\Controllers;
use Isaac\Core\Helpers\Controller;

class UsersController extends Controller{

    /**
     * @var object
     */
    private $users;

    public function __construct() {
        if(isLoggedIn() != 'true')
            redirect('/login');
        $this->users = $this->model('Users');
    }

    /**
     *
     */
    public function index()
    {
        $data['users'] = $this->users->getUsers();
//        die(var_dump($data));
        return view('users/index',$data);
    }

    public function create()
    {
        //die(var_dump($_POST));
        //Filter the values sent by the user for XSS attacks
        $post     = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $email    = clean($post['email']);
        $firstname = clean($post['firstname']);
        $lastname = clean($post['lastname']);
        $role = clean($post['role']);
        $password = password_hash('password',PASSWORD_DEFAULT);

        $data = [
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'role' => $role,
            'password' => $password
        ];

        $insert = $this->users->addUser($data);
        if($insert)
        {
            session_create('success','User Created');
            $this->index();
        }else{
            session_create('warning','Error Saving Data');
            //return view('users/index');
            redirect('/users');
        }

    }

    public function show($id)
    {
        $id = clean($id['id']);

        $data = [$this->users->getUserById($id)];
        //dd($data);
        return view('users/show',$data);
    }

    public function update($id)
    {
        $id = clean($id['id']);
        //Filter the values sent by the user for XSS attacks
        $post     = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $email    = clean($post['email']);
        $firstname = clean($post['firstname']);
        $lastname = clean($post['lastname']);
        $role = clean($post['role']);
        $data = [
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'role' => $role
        ];

        $result = $this->users->updateUser($id,$data);
        if($result)
        {
            session_create('success','User Updated Successfully');
            redirect('/users');
        }
    }

    public function delete($id)
    {
        $id = $id['id'];
        $deleted = $this->users->deleteUser($id);
        if($deleted){
            session_create('success','User deleted Successfully');
            redirect('/users');
        }
        session_create('warning','Error Deleting Data');
        redirect('/users');
    }
}
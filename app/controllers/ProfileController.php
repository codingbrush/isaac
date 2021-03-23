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
        
        $id = $id['id'];
        $post    = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         //dd($_POST);
        $firstname   = clean($post['firstname']);
        $userid  = clean($post['user_id']);
        $avatar   = $_FILES['avatar']['name'];
        $lastname = clean($_POST['lastname']);
        $email = clean($_POST['email']);
        $password = clean($_POST['password']);
        //dd($_FILES);
        
        $user = $this->users->getUserPassword($userid);
        $data_img = (!empty($user->avatar)) ? $user->avatar : NULL;
        if (empty($avatar)) {
            $upFile = $data_img;
        } else {
            $targetdir = "public/imgs/";
            // if(empty($_FILES["avatar"]["name"]))
            // {
            //     $upFile = NULL;
            // }else{
                $upFile = date("Y_m_d_H_i_s") . $_FILES["avatar"]["name"];
           // }

            if (is_uploaded_file($_FILES["avatar"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetdir.$upFile)) {
                    $imagename = $upFile;
                }
            }           
        }

        
        if(!empty($password)){
            $hashed_password = $password;
        }else{
            $hashed_password = NULL;
        }

        $data = [
            'id' => $id,
            'firstname'   => $firstname,
            'lastname'   => $lastname,
            'user_id' => $userid,
            'email' => $email,
            'avatar'   => $upFile,
            'password' => $hashed_password
            
        ];
       
        $saved = $this->users->updateUserProfile($id,$data);
        if ($saved) {
            session_create('success', 'Profile Updated Successfully');
            redirect('/profile');
        }
        session_create('warning', 'Error Updating Data');
        redirect('/profile');
    }
}
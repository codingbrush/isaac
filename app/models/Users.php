<?php

namespace Isaac\App\Models;

use Isaac\Core\Database\DbQuery;

class Users extends DbQuery
{

    /**
     * authenticate
     *
     * @param  string $email
     * @param  string $password
     * @return boolean
     */
    public function authenticate(String $email, String $password)
    {
        $this->sql('SELECT * FROM users WHERE email=:email ');
        $this->bind(':email', $email);
        $hashed_password = $this->single();
        $count           = $this->rowCount();
        if ($count > 0) {
            if (!password_verify($password, $hashed_password->password)) {
                $_SESSION['password_err'] = "Password is incorrect";
                return false;
            }
                //Get the user columns and roles
                $user = $this->getUserById($hashed_password->id);
            // create session variables for use during user session
            $_SESSION['name']       = ucfirst($hashed_password->firstname) . ' ' . ucfirst($hashed_password->lastname);
            $_SESSION['user_id']    = $hashed_password->id;
            $_SESSION['isLoggedIn'] = 'true';
            
            switch ($user->title) {
                case ($user->title === 'ADMIN'):
                    $_SESSION['isAdmin'] = 'true';
                    $_SESSION['avatar'] = $hashed_password->avatar;
                    break;
                case ($user->title === 'EXTENSION OFFICER'):
                case ($user->title === 'DISTRICT OFFICER'):
                    $_SESSION['isOfficer'] = 'true';
                    $_SESSION['avatar'] = $hashed_password->avatar;
                    break;
                default:
                    $_SESSION['isFarmer'] = 'true';
                    $_SESSION['avatar'] = $hashed_password->avatar;
            }

                return true;

        } else {
            $_SESSION['email_err'] = "Incorrect Email";
            return false;
        }

    }

    public function getUsers()
    {
        $id = $_SESSION['user_id'];
        $this->sql('SELECT * FROM users where id != :id');
        $this->bind(':id',$id);
        return $this->resultset();
    }


    /**
     * @param $data
     * @return int
     */
    public function addUser($data): int
    {
        $this->sql('INSERT INTO isaac.users (firstname,lastname,email,password,activated) VALUES(:firstname, :lastname, :email, :password,:activated)');
        $this->bind(':firstname',$data['firstname']);
        $this->bind(':lastname',$data['lastname']);
        $this->bind(':email',$data['email']);
       
        $this->bind(':password',password_hash($data['password'],PASSWORD_DEFAULT));
        $this->bind(':activated',true);
        $user = $this->execute();
        if($user){
            $id = $this->db->lastInsertId();
            $role = $this->addUserRole($id,$data['role'],$data['created_by']);
            return $role;
        }
        return 0;
    }

    /**
     * @param string $userid
     * @param string $roleid
     * @return int
     */
    public function addUserRole(string $userid, string $roleid, string $created_by): int
    {
        $this->sql('INSERT INTO user_role (userfk,rolefk,created_by) VALUES(:userfk, :rolefk, :created_by)');
        $this->bind(':userfk',$userid);
        $this->bind(':rolefk',$roleid);
        $this->bind(':created_by',$created_by);
        $this->execute();
        return $this->rowCount();
    }

    /**
     * logout: Unset and remove all session cookies set during the login method calls
     *
     * @return boolean
     */
    public function logout()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            unset($_SESSION['id']);
            unset($_SESSION['name']);
            unset($_SESSION['isLoggedIn']);
            session_destroy();
            return true;
        }
        return false;
    }

    /**
     * getNumberOfExtensionOfficers: Get the total number of extension officers registered
     *
     * @return object
     */
    public function getNumberOfExtensionOfficers()
    {
        $this->sql('SELECT
                    COUNT(*) AS extension_officers
                    FROM
                    user_role ur
                    LEFT JOIN role r ON  ur.rolefk = r.id
                    WHERE  r.title = "EXTENSION OFFICER"');
        return $this->single();
    }

    public function getNumberOfFarmers()
    {
        $this->sql('SELECT
                    COUNT(*) AS farmers
                    FROM
                    user_role ur
                    LEFT JOIN role r ON  ur.rolefk = r.id
                    WHERE  r.title = "FARMER"');
        return $this->single();
    }

    public function getUserById($id)
    {
        $this->sql('SELECT 
                  u.id,u.firstname,
                  u.lastname,u.email,u.avatar,
                  r.id as role_id,r.title 
                  FROM users u 
                  INNER JOIN user_role ur 
                  ON ur.userfk = u.id
                  INNER JOIN role r
                  ON r.id = ur.rolefk
                  WHERE u.id= :id');
        $this->bind(':id',$id);
        return $this->single();
    }

    public function getFarmerById($id)
    {
        $this->sql('SELECT 
                  u.id,u.firstname,u.activated,
                  u.lastname,u.email,u.avatar,
                  r.id as role_id,r.title 
                  FROM users u 
                  INNER JOIN user_role ur 
                  ON ur.userfk = u.id
                  INNER JOIN role r
                  ON r.id = ur.rolefk
                  WHERE ur.created_by= :id');
        $this->bind(':id',$id);
        return $this->resultset();
    }

    public function getUserPassword($id)
    {
        $this->sql('SELECT password, avatar from users where id = :id');
        $this->bind(':id',$id);
        return $this->single();
    }

    public function updateUser($id,$data)
    {
        $this->sql('UPDATE users SET firstname=:firstname, lastname=:lastname, email=:email where id=:id');
        $this->bind(':firstname',$data['firstname']);
        $this->bind(':lastname',$data['lastname']);
        $this->bind(':email',$data['email']);
        $this->bind(':id',$id);
        if ($this->execute() && $this->updateUserRole($id,$data['role'])) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUserProfile($id,$data)
    {
        $this->sql('UPDATE users SET firstname=:firstname, lastname=:lastname, email=:email, avatar=:avatar, password=:password where id=:id');
        $this->bind(':firstname',$data['firstname']);
        $this->bind(':lastname',$data['lastname']);
        $this->bind(':email',$data['email']);
        $this->bind(':password',(empty($data['password'])) ? password_hash('password',PASSWORD_DEFAULT) : password_hash($data['password'],PASSWORD_DEFAULT) );
        $this->bind(':avatar',$data['avatar']  );
        $this->bind(':id',$id);
        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUserRole($id,$role)
    {
        $this->sql('UPDATE user_role SET rolefk=:role_id WHERE userfk=:id');
        $this->bind(':role_id',$role);
        $this->bind(':id',$id);
        if ($this->execute()) {
            return true;
        } else {
            echo "PROBLEM";
            return false;
        }
    }

    public function deleteUser($id)
    {
        $this->sql('delete from isaac.users where id = :id');
        $this->bind(':id',$id);
        return $this->execute();
    }

}

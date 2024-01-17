<?php
class Auth_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }

    public function authenticate($email, $password)
    {
        if ($user = $this->row(['email' => $email])) {
            if ($user->password == $password) {
                return ($user->is_active) ? ['status' => true, 'user' => $user] : ['status' => false, 'error' => ['active' => 'Your Account is Blocked by Admin....']];
            } else {
                return ['status' => false, 'error' => ['password' => 'Incorrect Password...']];
            }
        } else {
            return ['status' => false, 'error' => ['email' => 'No User Found with this Email...']];
        }
    }
}

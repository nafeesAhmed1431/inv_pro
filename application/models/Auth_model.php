<?php
class Auth_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function authenticate($email, $password)
    {
        if ($user = $this->get_row('tbl_users', ['email' => $email])) {
            if ($user->password == $password) {
                return [
                    'status' => true,
                    'user' => $user
                ];
            } else {
                return [
                    'status' => false,
                    'error' => ['password' => 'Incorrect Password...']
                ];
            }
        } else {
            return [
                'status' => false,
                'error' => ['email' => 'No User Found with this Email...']
            ];
        }
    }
}

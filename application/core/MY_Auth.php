<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function load_view($view, $data = null, $meta = null)
    {
        $this->load->view('auth/auth_header',$meta);
        $this->load->view('auth/login',$data);
        $this->load->view('auth/auth_footer');
    }
}

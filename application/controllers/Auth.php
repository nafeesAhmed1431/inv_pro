<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('auth_helper');
        $this->load->model('auth_model');
    }

    function load_view($view, $data = null, $meta = null)
    {
        $this->load->view('auth/auth_header');
        $this->load->view("auth/$view", $data);
        $this->load->view('auth/auth_footer');
    }

    public function login()
    {
        if (isAuthenticated()) {
            redirect('dashboard');
        }

        $this->load_view('login', $this->config->item('company'));
    }

    public function login_auth()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->form_validation->run('auth/login')) {
            $res = $this->auth_model->authenticate($email, $password);
            if ($res['status']) {
                echo json_encode(['status' => login($res['user']), 'redirect_url' => base_url('dashboard')]);
            } else {
                echo json_encode($res);
            }
        } else {
            echo json_encode(['status' => false, 'error' => $this->form_validation->error_array()]);
        }
    }

    public function register()
    {
        $this->load_view('register', $this->config->item('company'));
    }

    public function logout()
    {
        logout();
        redirect('');
    }
}

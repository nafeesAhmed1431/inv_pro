<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isAuthenticated()) {
            return redirect('login');
        }
    }

    public function pp()
    {
        exit("<pre>" . print_r(func_get_args(), true) . "</pre>");
    }

    public function load_view($view, $data = null, $meta = null)
    {
        $meta['page_title'] = get_called_class();
        $this->load->view('partials/header', $meta);
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view($view, $data);
        $this->load->view('partials/footer');
    }
}

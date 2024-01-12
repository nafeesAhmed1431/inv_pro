<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load_view('products/index');
    }

    public function index_content()
    {
        $data = [];
        echo json_encode(['status' => true, 'html' => $this->load->view('products/index_content', $data, true)]);
    }
}

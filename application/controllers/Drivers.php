<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Drivers extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('driver_model', 'model');
    }

    public function index()
    {
        $this->load_view('drivers/index');
    }

    public function index_content()
    {
        $data['total'] = $this->model->count();
        $data['active'] = $this->model->count(['is_active' => 1]);
        $data['inActive'] = $this->model->count(['is_active' => 0]);
        $data['drivers'] = $this->model->all();
        echo json_encode(['status' => true, 'html' => $this->load->view('drivers/index_content', $data, true)]);
    }

    public function get()
    {
        $row = $this->model->get($this->input->get('id'));
        echo json_encode(['status' => !empty($row), 'data' => $row]);
    }

    public function add()
    {
        if ($this->form_validation->run('drivers/add|update')) {
            echo json_encode([
                'status' => $this->model->insert([
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'cnic' => $this->input->post('cnic'),
                    'vehicle_no' => $this->input->post('vehicle_no'),
                    'phone_1' => $this->input->post('phone_1'),
                    'phone_2' => $this->input->post('phone_2'),
                    'phone_3' => $this->input->post('phone_3'),
                    'is_active' => $this->input->post('status'),
                    'created_at' => date('Y-m-d H:i:s'),
                ], true)
            ]);
        } else {
            echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
        }
    }

    public function update()
    {
        if ($this->form_validation->run('drivers/add|update')) {
            echo json_encode([
                'status' => $this->model->update([
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'cnic' => $this->input->post('cnic'),
                    'vehicle_no' => $this->input->post('vehicle_no'),
                    'phone_1' => $this->input->post('phone_1'),
                    'phone_2' => $this->input->post('phone_2'),
                    'phone_3' => $this->input->post('phone_3'),
                    'is_active' => $this->input->post('status'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ], ['id' => $this->input->post('id')])
            ]);
        } else {
            echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
        }
    }

    public function delete()
    {
        echo json_encode(['status' => $this->model->delete($this->input->post('id'))]);
    }
}

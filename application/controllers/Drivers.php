<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Drivers extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('driver_model');
    }

    public function index()
    {
        $this->load_view('drivers/index');
    }

    public function index_content()
    {
        $data['total'] = $this->driver_model->count();
        $data['active'] = $this->driver_model->count(['is_active' => 1]);
        $data['inActive'] = $this->driver_model->count(['is_active' => 0]);
        $data['drivers'] = $this->driver_model->all();
        echo json_encode(['status' => true, 'html' => $this->load->view('drivers/index_content', $data, true)]);
    }

    public function get()
    {
        $user = $this->driver_model->get($this->input->get('id'));
        echo json_encode(['status' => !empty($user), 'data' => $user]);
    }

    public function add()
    {
        if ($this->form_validation->run('drivers/add|update')) {
            $res = $this->driver_model->insert([
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
            ], true);
            echo json_encode(['status' => $res]);
        } else {
            echo json_encode([
                'status' => false,
                'errors' => $this->form_validation->error_array()
            ]);
        }
    }

    public function update()
    {
        if ($this->form_validation->run('drivers/add|update')) {
            $res = $this->driver_model->update([
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
            ], ['id' => $this->input->post('id')]);
            echo json_encode([
                'status' => $res
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'errors' => $this->form_validation->error_array()
            ]);
        }
    }

    public function delete()
    {
        echo json_encode([
            'status' => $this->driver_model->delete($this->input->post('id'))
        ]);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('supplier_model', 'model');
	}

	public function index()
	{
		$this->load_view('suppliers/index', null, ['page_title' => 'Suppliers | All']);
	}

	public function index_content()
	{
		$data['keyword'] = "supplier";
		$data['total'] = $this->model->count();
		$data['active'] = $this->model->count(['is_active' => 1]);
		$data['inActive'] = $this->model->count(['is_active' => 0]);
		$data['data'] = $this->model->all();
		echo json_encode(['status' => true, 'html' => $this->load->view('suppliers/index_content', $data, true)]);
	}

	public function get_supplier()
	{
		$row = $this->model->get($this->input->get('id'));
		echo json_encode(['status' => !empty($row), 'data' => $row]);
	}

	public function add_supplier()
	{
		if ($this->form_validation->run('suppliers/add|update')) {
			echo json_encode([
				'status' => $this->model->insert([
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address'),
					'description' => $this->input->post('description'),
					'email' => $this->input->post('email'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'country' => $this->input->post('country'),
					'opening_balance' => $this->input->post('opening_balance'),
					'is_active' => 1,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
				], true)
			]);
		} else {
			echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
		}
	}

	public function update_supplier()
	{
		if ($this->form_validation->run('suppliers/add|update')) {
			echo json_encode([
				'status' => $this->model->update([
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address'),
					'description' => $this->input->post('description'),
					'email' => $this->input->post('email'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'country' => $this->input->post('country'),
					'opening_balance' => $this->input->post('opening_balance'),
					'is_active' => $this->input->post('status'),
					'updated_at' => date('Y-m-d H:i:s'),
				], ['id' => $this->input->post('id')])
			]);
		} else {
			echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
		}
	}

	public function delete_supplier()
	{
		echo json_encode(['status' => $this->model->delete($this->input->post('id'))]);
	}
}

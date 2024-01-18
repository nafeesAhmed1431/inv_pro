<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplies extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('supply_model', 'model');
	}

	public function index()
	{
		$this->load_view('branches/index',null,['page_title' => 'Branches | All']);
	}

	public function index_content()
	{
		$data['keyword'] = "branch";
		$data['total'] = $this->model->count();
		$data['active'] = $this->model->count(['is_active' => 1]);
		$data['inActive'] = $this->model->count(['is_active' => 0]);
		$data['data'] = $this->model->all();
		echo json_encode(['status' => true, 'html' => $this->load->view('branches/index_content', $data, true)]);
	}

	public function get()
	{
		$row = $this->model->get($this->input->get('id'));
		echo json_encode(['status' => !empty($row), 'data' => $row]);
	}

	public function add()
	{
		if ($this->form_validation->run('branches/add|update')) {
			echo json_encode([
				'status' => $this->model->insert([
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'landline_1' => $this->input->post('landline_1'),
					'landline_2' => $this->input->post('landline_2'),
					'landline_3' => $this->input->post('landline_3'),
					'address' => $this->input->post('address'),
					'description' => $this->input->post('desc'),
					'is_active' => 1,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
				], true)
			]);
		} else {
			echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
		}
	}

	public function update()
	{
		if ($this->form_validation->run('branches/add|update')) {
			echo json_encode([
				'status' => $this->model->update([
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'landline_1' => $this->input->post('landline_1'),
					'landline_2' => $this->input->post('landline_2'),
					'landline_3' => $this->input->post('landline_3'),
					'address' => $this->input->post('address'),
					'description' => $this->input->post('desc'),
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

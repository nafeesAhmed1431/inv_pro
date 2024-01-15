<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employees extends MY_Controller
{
	private $keyword;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('employee_model');
		$this->keyword = 'employee';
	}

	public function index()
	{
		$this->load_view('employees/index');
	}

	public function index_content()
	{
		$data['total'] = $this->employee_model->count();
		$data['active'] = $this->employee_model->count(['is_active' => 1]);
		$data['inActive'] = $this->employee_model->count(['is_active' => 0]);
		$data['data'] = $this->employee_model->all();
		$data['keyword'] = $this->keyword;
		echo json_encode(['status' => true, 'html' => $this->load->view('employees/index_content', $data, true)]);
	}

	public function get()
	{
		$row = $this->employee_model->get($this->input->get('id'));
		echo json_encode(['status' => !empty($row), 'data' => $row]);
	}

	public function add()
	{
		if ($this->form_validation->run('employees/add|update')) {
			$res = $this->employee_model->insert([
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'is_active' => $this->input->post('status'),
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
		if ($this->form_validation->run('employees/add|update')) {
			$res = $this->employee_model->update([
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'is_active' => $this->input->post('status'),
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
			'status' => $this->employee_model->delete($this->input->post('id'))
		]);
	}
}
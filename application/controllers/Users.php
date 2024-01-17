<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{
	private $user_id;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','model');
		$this->user_id = $this->session->userdata('user')->id;
	}

	public function index()
	{
		$this->load_view('users/index');
	}

	public function index_content()
	{
		$data['total'] = $this->model->count(['id !=' => $this->user_id]);
		$data['active'] = $this->model->count(['is_active' => 1, 'id !=' => $this->user_id]);
		$data['inActive'] = $this->model->count(['is_active' => 0, 'id !=' => $this->user_id]);
		$data['users'] = $this->model->where(['id !=' => $this->user_id]);
		echo json_encode(['status' => true, 'html' => $this->load->view('users/users_table', $data, true)]);
	}

	public function get()
	{
		$user = $this->model->get($this->input->get('id'));
		echo json_encode(['status' => !empty($user), 'data' => $user]);
	}

	public function add()
	{
		if ($this->form_validation->run('users/add|update')) {
			$res = $this->model->insert([
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
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
		if ($this->form_validation->run('users/add|update')) {
			$res = $this->model->update([
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
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
			'status' => $this->model->delete($this->input->post('id'))
		]);
	}
}

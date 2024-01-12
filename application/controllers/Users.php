<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$data['total'] = $this->user_model->count();
		$data['active'] = $this->user_model->count(['is_active' => 1]);
		$data['inActive'] = $this->user_model->count(['is_active' => 0]);
		$this->load_view('users/index', $data);
	}

	public function users_table()
	{
		echo json_encode(['status' => true, 'html' => $this->load->view('users/users_table', ['users' => $this->user_model->all()], true)]);
	}

	public function get()
	{
		$user = $this->user_model->get($this->input->get('id'));
		echo json_encode(['status' => !empty($user), 'data' => $user]);
	}
}

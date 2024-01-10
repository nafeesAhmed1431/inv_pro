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
		$this->load_view('users/index');
	}

	public function users_table()
	{
		$users = $this->user_model->get_all();
	}
}

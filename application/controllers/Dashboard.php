<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('branch_model');
		$this->load->model('driver_model');
		$this->load->model('employee_model');
		$this->load->model('user_model');
		// $this->load->library('Stripe');
	}

	public function index()
	{
		$data['total_users'] = $this->user_model->count();
		$data['total_branches'] = $this->branch_model->count();
		$data['total_employees'] = $this->employee_model->count();
		$data['total_drivers'] = $this->driver_model->count();
		$this->load_view('dashboard', $data);
	}
}

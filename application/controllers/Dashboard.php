<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Stripe');
	}
	
	public function index()
	{
		$this->load_view('dashboard');
	}
}

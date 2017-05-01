<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Nav_menu extends MY_Controller {	

	public function __construct()
	{
		parent::__construct();

		
	}

	public function index()
	{
		
		$this->template->render("bootstrap1");
	}

	public function basic()
	{
		$this->load->view("basic");
	}

	public function inject()
	{
		$this->load->view("inject");
	}

	public function bootstrap1()
	{
		
		$this->load->view("bootstrap1");
	}

	public function bootstrap2()
	{		
		$this->load->view("bootstrap2");
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['full_name'] = $this->ion_auth->user()->row()->first_name;
		
	}
	public function index()
	{

		$this->data['user'] = $this->ion_auth->user()->row()->first_name;
		$this->data['group'] = $this->ion_auth->get_users_groups()->row()->name;
		$this->template->content->view('vw_dashboard', $this->data);
		$this->template->publish();
	}

}

/* End of file dashboard.php */
/* Location: ./application/modules/dashboard/controllers/dashboard.php */